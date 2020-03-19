#!/bin/bash
read MESSAGE
python -u ./script.py `echo $MESSAGE | cut -d '|' -f1` `echo $MESSAGE | cut -d '|' -f2`
