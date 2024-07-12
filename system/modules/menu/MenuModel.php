<?php

declare(strict_types=1);

namespace modules\menu;

use App\Database;

class MenuModel extends Database
{
  public function __construct()
  {
    parent::__construct();

    return self::getInstance();
  }

  public static function groupedByCategory()
  {
    $query = 'SELECT
    E.*,
    M.*

    FROM tbl_menueventos M

    left join tbl_cateventos E on E.idcatevento = M.categoria

    ORDER BY idcatevento ASC';

    $result = self::$instance->query($query)->findAll();

    // group by category
    $grouped = [];
    foreach ($result as $row) {
      $grouped[$row['descatevento']][] = $row;
    }

    return $grouped;
  }
}
