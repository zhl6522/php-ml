@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../symplify/easy-coding-standard/bin/ecs
php "%BIN_TARGET%" %*
