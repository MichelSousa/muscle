@echo off
for /f "tokens=*" %%x in ('dir /b *.png') do (
echo "crushing %%x"
optipng.exe -o7 -strip all "%%x"
)
for /f "tokens=*" %%y in ('dir /b *.jpg') do (
echo "crushing %%y"
jpegtran.exe -optimize "%%y" temp.jpg
move /Y temp.jpg "%%y"
)
for /f "tokens=*" %%z in ('dir /b *.jpeg') do (
echo "crushing %%z"
jpegtran.exe -optimize "%%z" temp.jpeg
move /Y temp.jpeg "%%z"
)
