@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../symplify/easy-coding-standard/bin/easy-coding-standard
php "%BIN_TARGET%" %*
