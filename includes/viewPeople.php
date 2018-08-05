<?php
    class ViewPeople extends GetData {
        
        public function showPeople() {
            
            $data = $this->getTotal()['results'];

            if(!empty($_GET) && ($_GET['limit'] !=='' 
                && $_GET['offset'] !== '')) {

                if($_GET['limit'] && $_GET['offset']) {
                    
                    $limit = $_GET['limit'];
                    $offset = $_GET['offset'];

                    for($i = 0; $i < $limit; $i++) {
                        echo '<tr>';
                        foreach($data[$offset] as $key => $value) {
                            echo '<td>';
                            echo $value;
                            echo '</td>';
                        }
                        $offset++;
                        echo '</tr>';
                    }
                } else if(!($_GET['limit'] && $_GET['offset'])) {
                    $limit = 20;
                    $offset = 0;

                    for($i = 0; $i < 20; $i++) {
                        echo '<tr>';
                        
                        foreach($data[$i] as $key => $value) {
                            echo '<td>';
                            echo $value;
                            echo '</td>';
                        }
                    
                        echo '</tr>';
                    }
                }
            }

        }

        
        public function getQuantity() {
            $quantity = $this->getTotal()['quantity'];
            return $quantity;
        }
    }
?>