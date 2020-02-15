#!/bin/bash

echo "Please enter a password"

read pass;

length=${#pass}

success=0

if [[ $length < 8 ]]
then
	echo "You need at least 8 characters";
else
	success=$((success+1));
fi
if [[ "$pass" =~ [a-z] ]]
then
	success=$((success+1));
else
	echo "You need at least 1 lowercase letter";
fi
if [[ "$pass" =~ [A-Z] ]]
then
	success=$((success+1));
else
	echo "You need at least 1 uppercase letter";
fi
if [[ "$pass" =~ [0-9] ]]
then
	success=$((success+1));
else
	echo "You need at least 1 number";
fi
if [[ "$pass" =~ [^a-zA-Z0-9] ]]
then
	success=$((success+1));
else
	echo "You need at least 1 special character such as @ $ or ^";
fi
if [[ $success == 5 ]]
then
	echo "Your password is strong enough!";
fi
if [[ success == 5 ]]
then
	echo "Your password is strong enough";
fi
