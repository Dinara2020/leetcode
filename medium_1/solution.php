/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {
        public function recursion($link, $value) {
        if ($link->next !== null) {
          $value[] = $link->val;
            $link = $link->next;      
            return $this->recursion($link, $value);
        } else {
        $value[] = $link->val;
            return $value;
            }
    }
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $arr1 = $this->recursion($l1, []);
        $arr2 = $this->recursion($l2,[]);
        $count1 = count($arr1);
        $count2 = count($arr2);
        $arr1 = array_reverse($arr1);
        $arr2 = array_reverse($arr2);
        if ($count2 > $count1) {
            $diff = $count2 - $count1;
            for ($i = 0; $i < $diff; $i++) {
                array_unshift($arr1 , 0);
            }
        }
        $sum1 = count($arr1);
        $sum2 = count($arr2);

        for($i = 0; $i < $sum1; $i++) {
             $num1 = $num1 . $arr1[$i]; 
        }
        for($i = 0; $i < $sum2; $i++) {
             $num2 = $num2 . $arr2[$i];            
        }
        $result = '';
        $next = 0;
        
        $num1 = strrev($num1);
        $num2 = strrev($num2);
        $countFinish = $count1 > $count2 ? $count1 : $count2;
        for($i = 0; $i < $countFinish; $i++) {
                 if (!$num2[$i]) {$num2[$i] = 0;}
                 $sum = (int)$num1[$i] + (int)$num2[$i] + $next;
                
                 if ($sum > 9) {
                     if (!($i === $countFinish -1 )) {
                         $sum = substr($sum, -1);
                     }
                     $next = 1;
                 } else {
                     $next = 0;
                 }
                 $result = $sum.$result;
        }

        for($i = 0; $i < strlen($result); $i++) {
            if ($result[$i+1] !== null) {
                if ($itogo) {
                    $itogo = new ListNode((int)$result[$i], $itogo);
                } else {
                    $itogo = new ListNode((int)$result[$i], null);
                }
                
            } 
        }

        return $itogo;
    }
}
