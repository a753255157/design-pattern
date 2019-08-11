<?php
namespace interfaces;

interface ObserveServer {
    function attach(string $name, Observer $observer);
    function detach(string $name, Observer $observer);
    function notify();
}