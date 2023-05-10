from django.contrib import admin
from django.urls import path
from pengunjung import views

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', views.MasukPage, name='Masuk'),
    path('daftar/', views.DaftarPage, name='Daftar'),
    path('home/', views.HomePage, name='Dashboard'),
]
