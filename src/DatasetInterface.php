<?php

declare(strict_types=1);

namespace Loner\Dataset;

/**
 * 数据集
 */
interface DatasetInterface
{
    /**
     * 返回默认数据集
     *
     * @return array
     */
    public static function dataset(): array;
}
