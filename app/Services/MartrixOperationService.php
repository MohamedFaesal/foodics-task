<?php

namespace App\Services;

use App\Exceptions\MatrixValidationException;

class MartrixOperationService
{
    public function checkMatrixValidation(array $matrix) : bool
    {
        if (!is_array($matrix[0])) {
            return false;
        }
        $colsCount = count($matrix[0]);
        foreach ($matrix as $rows) {
            if (!is_array($rows) || count($rows) != $colsCount) {
                return false;
            }
        }
        return true;
    }

    public function multiply(array $martrix1, array $martrix2) : array
    {
        if (!$this->checkMatrixValidation($martrix1) || !$this->checkMatrixValidation($martrix2)) {
            throw new MatrixValidationException('Matrix are not valid');
        }
        $matrix1ColCount = count($martrix1[0]);
        $matrix2RowCount = count($martrix2);
        if ($matrix1ColCount != $matrix2RowCount) {
            throw new MatrixValidationException('Matrix are not valid');
        }

        $matrix1RowCount = count($martrix1);
        $matrix2ColCount = count($martrix2[0]);
        $result = [];

        for($i = 0; $i < $matrix1RowCount; $i++) {
            $result[$i] = [];
            for($j = 0; $j < $matrix2ColCount; $j++) {
                $result[$i][$j] = 0;
                for($k=0; $k < $matrix2RowCount; $k++) {
                    $result[$i][$j] += $martrix1[$i][$k] * $martrix2[$k][$j];
                }
            }
        }

        for($i = 0; $i < $matrix1RowCount; $i++) {
            for($j = 0; $j < $matrix2ColCount; $j++) {
                $result[$i][$j] = $this->convertNumberToExcelLetter((int)$result[$i][$j]);
            }
        }

        return $result;
    }

    public function convertNumberToExcelLetter(int $val) : string
    {
        $str = "";
        $i = 0;
        while ($val > 0) {
            $rem = $val % 26;
            if ($rem ==  0) {
                $str[$i++] = 'Z';
                $val = (int)($val / 26) - 1;
            } else {
                $str[$i++] = chr(($rem - 1) + 65);
                $val = (int) ($val / 26);
            }
        }
        return strrev($str);
    }
}
