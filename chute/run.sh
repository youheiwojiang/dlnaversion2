#!/bin/bash

chmod 777 /music
chmod 777 /root
chmod 777 /root/.cache
chmod -R 777 /root/.cache/rygel
iptables -t nat -A POSTROUTING -s 192.168.0.0/16 -o eth0 -j MASQUERADE
/etc/init.d/apache2 restart
/usr/bin/rygel
