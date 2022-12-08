"use strict";

// Class Definition
var KTPasswordResetGeneral = (function () {
  // Elements
  var form;
  var submitButton;
  var validator;

  var handleForm = function (e) {
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    validator = FormValidation.formValidation(form, {
      fields: {
        email: {
          validators: {
            notEmpty: {
              message: "Email address is required",
            },
            emailAddress: {
              message: "The value is not a valid email address",
            },
          },
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: ".fv-row",
          eleInvalidClass: "",
          eleValidClass: "",
        }),
      },
    });

    submitButton.addEventListener("click", function (e) {
      e.preventDefault();

      // Validate form
      validator.validate().then(function (status) {
        if (status == "Valid") {
          // Show loading indication
          submitButton.setAttribute("data-kt-indicator", "on");

          // Disable button to avoid multiple click
          submitButton.disabled = true;

          // Simulate ajax request
          setTimeout(function () {
            // Hide loading indication
            submitButton.removeAttribute("data-kt-indicator");

            // Enable button
            submitButton.disabled = false;

            // Submit data
            var data = $(".form").serialize();
            $.ajax({
              type: "POST",
              url: "password-reset-method.php",
              data: data,
              dataType: "json",
              success: function (response) {
                if (response.status == true) {
                  // Show success message
                  Swal.fire({
                    text: "The account you entered is registered, please check your email to change the password!",
                    icon: "success",
                    customClass: {
                      confirmButton: "btn btn-primary",
                    },
                  });
                } else if (response.status == false) {
                  // Show error message
                  Swal.fire({
                    text: "The account you entered is not registered, please check your email!",
                    icon: "error",
                    customClass: {
                      confirmButton: "btn btn-primary",
                    },
                  });
                }
              },
            });
          }, 10000);
        } else {
          // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
          Swal.fire({
            text: "Sorry, looks like there are some errors detected, please try again.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
              confirmButton: "btn btn-primary",
            },
          });
        }
      });
    });
  };

  // Public Functions
  return {
    // public functions
    init: function () {
      form = document.querySelector("#kt_password_reset_form");
      submitButton = document.querySelector("#kt_password_reset_submit");

      handleForm();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTPasswordResetGeneral.init();
});
