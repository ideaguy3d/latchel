<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 11/17/2019
 * Time: 9:03 PM
 */

echo "\n\nhello world ^_^/";



class MonthlySalesReport
{
    // public access modifiers
    public bool $hitSalesGoal;
    public string $salesRep;
    
    // private access modifiers
    private int $salesGoal = 7500;
    private float $totalSales = 0;
    private array $salesData;
    
    public function __construct($data) {
        $this->salesRep = $data['sales_rep'];
        $this->salesData = $data['sales_data'];
        $this->analyzeSalesData();
    }
    
    private function analyzeSalesData() {
        foreach($this->salesData as $job) {
            $this->totalSales += $job['sales_amount'];
        }
        if($this->totalSales > $this->salesGoal) $this->hitSalesGoal = true;
        else $this->hitSalesGoal = false;
    }
    
    public function getResult() {
        if($this->hitSalesGoal) $o = "<p>$this->salesRep hit the sales goal</p>";
        else $o = "<p>$this->salesRep  failed to hit the sales goal</p>";
        return $o;
    }
}

// mock data PHP scans from a file on disk
$augSalesData = [
    'sales_rep' => 'Mark',
    'sales_data' => [
        ['sales_amount' => 957.25],
        ['sales_amount' => 2499.21],
        ['sales_amount' => 512.83],
        ['sales_amount' => 4278.35],
    ],
];

// after scanning, PHP automatically does data analysis
$salesReport = new MonthlySalesReport($augSalesData);
$output_oop_basics = $salesReport->getResult();

jaGeneratorsStruct();

function jaGeneratorsStruct() {
    function q1_new_customers() {
        $janFebMar = [
            ['Property One Acquisitions', 'Mark'],
            ['5th Point Lending', 'Bill'],
            ['Hills Sisters LLC', 'Joe'],
            ['Atlantic Lending', 'Bill'],
        ];
        $total = 0;
        foreach($janFebMar as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function q2_new_customers() {
        $aprMayJune = [
            ['Ultra Flow Works', 'Bill',],
            ['Print Queens USA', 'Joe'],
            ['Knit Pack Printing', 'Mark'],
        ];
        $total = 0;
        foreach($aprMayJune as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function q3_new_customers() {
        $julyAugSep = [
            ['Royal Acquisitions', 'Mark'],
            ['1st Street Lending', 'Bill'],
            ['Cal Cousins Inc', 'Joe'],
            ['Pacific Lend Tech', 'Joe'],
        ];
        $total = 0;
        foreach($julyAugSep as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function q4_new_customers() {
        $octNovDec = [
            ['Super Flow Works', 'Bill',],
            ['Prince Printing USA', 'Joe'],
            ['Knit Knack Mailing', 'Mark'],
            ['Fluid Works', 'Mark',],
            ['Mail Experts USA', 'Joe'],
            ['Upward Financial', 'Mark'],
        ];
        
        $total = 0;
        foreach($octNovDec as $newCustomer) {
            $sales_rep = $newCustomer[1];
            $new_customer = $newCustomer[0];
            $total++;
            yield $sales_rep => $new_customer;
        }
        return $total;
    }
    
    function newCustomersDataAnalysis() {
        // data analysis
        $da = new class() {
            private int $year_total = 0;
            
            public function addTotal(int $total): void {
                $this->year_total += $total;
            }
        };
        $q1 = q1_new_customers();
        yield from $q1;
        yield from q2_new_customers();
        yield from q3_new_customers();
        yield from q4_new_customers();
        
        $da->addTotal($q1);
        $da->addTotal(q2_new_customers()->getReturn());
        $da->addTotal(q3_new_customers()->getReturn());
        $da->addTotal(q4_new_customers()->getReturn());
        
        return $da;
    }
    
    // new customers per month
    $newCustomers = newCustomersDataAnalysis();
    $results = [];
    foreach($newCustomers as $salesRep => $newCustomer) {
        $debug = 1;
        if(!isset($results[$salesRep])) {
            $results[$salesRep] = [$newCustomer];
        }
        else {
            $results[$salesRep] = array_merge($results[$salesRep], $newCustomer);
        }
    }
    $debug = 1;
}

$break = 'point';

















// END OF .php file