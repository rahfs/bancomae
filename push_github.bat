@echo off
set /p msg="Digite a mensagem do commit: "

REM Adiciona todos os arquivos
git add .

REM Cria o commit com sua mensagem
git commit -m "%msg%"

REM Garante que o remote origin está configurado para o seu repositório
git remote add origin https://github.com/rahfs/bancomae.git 2>nul
git remote set-url origin https://github.com/rahfs/bancomae.git

REM Garante que a branch principal chama-se 'main' (padrão GitHub)
git branch -M main

REM Envia os arquivos para o GitHub
git push -u origin main

echo.
echo ===========================================
echo Arquivos enviados com sucesso para o GitHub!
echo ===========================================
pause
