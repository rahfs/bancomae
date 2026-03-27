@echo off
echo ===============================
echo Atualizando repositorio Git...
echo ===============================

REM Caminho da pasta do seu repositorio local
cd /d C:\xampp\htdocs\bancomae

REM Verifica se é um repositorio git
if not exist ".git" (
    echo Esta pasta nao e um repositorio Git!
    pause
    exit /b
)

REM Puxa as atualizacoes do GitHub
git pull origin main

echo ===============================
echo Atualizacao concluida!
echo ===============================

pause