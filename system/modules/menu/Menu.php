<?php

declare(strict_types=1);

namespace modules\menu;

class Menu
{
  public function __construct($model = new MenuModel())
  {
  }

  public function index()
  {
    $menuData = MenuModel::groupedByCategory();
    view('index', compact('menuData'));
  }
}
