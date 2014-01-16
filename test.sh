#!/bin/bash

make test
CODE=$?
"{$CODE}"
        if [[ $CODE = 0 ]]; then
                MESSAGE="Tests ran succesfully"
                SOUND="Submarine"
        else
                MESSAGE="Tests are broken"
        fi

        terminal-notifier -title "Tests" -message "${MESSAGE}" -group "1337"


