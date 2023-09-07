@echo off
title Running Commands

REM Open two CMD windows
start "CMD Window 1" cmd.exe /K "cd /d E:\xampp\htdocs\Projects\SMS & php artisan serve --port=8000 & pause"
start "CMD Window 2" cmd.exe /K "cd /d E:\xampp\htdocs\Projects\Capellan_EMS\Capellan_EMS  & php artisan serve --port=8001 & pause"