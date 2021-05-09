#!/bin/bash
name= echo "$1";
cd ../resources/views/layouts; 
grep -v "$name" sidePlugins.blade.php > /tmp/tmp; 
mv /tmp/tmp sidePlugins.blade.php;
