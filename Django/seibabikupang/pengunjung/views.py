from django.shortcuts import render
from django.contrib.auth.models import User

# Create your views here.


def HomePage(request):
    return render(request, 'admins/home.html')


def MasukPage(request):
    return render(request, 'auth/masuk.html')


def DaftarPage(request):
    if request.method=='POST':
        username=request.POST.get('username')
        email=request.POST.get('email')
        telp=request.POST.get('telp')
        password1=request.POST.get('password1')
        password2=request.POST.get('password2')
    return render(request, 'auth/daftar.html')
