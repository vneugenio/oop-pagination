<?php
    class GetData extends DbConnection {

        protected function getTotal() {
            $query = 'SELECT * FROM `sample_Table`';
            $result = $this->connect()->query($query);
            $numRows = $result->num_rows;
            $rows = $result->fetch_all();

            return ['results' => $rows, 'quantity' => $numRows];
        }
    }

?>