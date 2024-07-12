<?php

use core\View;

function view($view = 'index', array $viewReceivedData = [], $mergeData = [])
{
  View::render($view, $viewReceivedData);
}

function currency($value)
{
  $formatter = new NumberFormatter('pt_PT', NumberFormatter::CURRENCY);

  return  $formatter->formatCurrency($value, 'EUR');
}
