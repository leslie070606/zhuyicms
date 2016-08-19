#!/bin/sh

function monitor() {
	ps -ef | grep "{$1}" | grep -v grep
	if [ $? -ne 0 ]
	then
		echo "start atm process..."
		nohup /home/qixinliang/git/zhuyicms/yii $1 &
	fi
}

monitor "atm/run"
