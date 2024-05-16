<?php echo view('header'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Filter</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        h1 {
            margin: 1.5rem 0px;
        }

        .main {
            display: flex;
            justify-content: space-evenly;
            align-items: left;
            flex-direction: column;
        }

        .costomerType,
        .constitution,
        .product,
        .calculator {
            display: flex;
            flex-direction: column;
            width: 46%;
            margin: 0.4rem;
        }

        label {
            font-size: 1.2rem;
            font-weight: bold;
        }

        select {
            padding: 5px;
            border-radius: 10px;
            outline: none;
            margin: 0.4rem 0;

        }

        table {
            margin: auto;
        }

        table,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            border: 1px solid black;
            background-color: #edc635;
            padding: 5px;
        }

        .btn {
            width: 35%;
            margin: 2rem;
        }

        .btn button {
            padding: 0.5rem 0.9rem;
            outline: none;
            border-radius: 10px;
            background-color: #eec11a;
            /* color:white; */
            border: none;
        }

        .btn button:hover {
            background-color: #edc635;
        }

        #reportContainer {
            text-align: center;
        }

        /* output */
        #calculator {
            border: 2px solid black;
            border-radius: 10px;
            padding: 1rem;
        }

        input {
            width: 40%;
            margin: 0.4rem;
            border-radius: 10px;
            padding: 0.4rem;
            outline: none;
            border: 1px solid black;
        }

        #calculator button {
            display: block;
            padding: 0.5rem 1rem;
            margin: auto;
            border-radius: 10px;
            outline: none;
            border: none;
            background-color: #eec11a;
        }
        #calculator button {
            background-color: #edc635;
        }
        #result, #result2, #result3, #result4, #result5, #result6{
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="heading">
            <h1>Eligibility Calculator</h1>
        </div>
        <div class="row">
            <div class="main col-6 flex-direction-column">
                <div class="costomerType">
                    <label for="category1">Customer Type</label>
                    <select id="category1" name="category1" onchange="changedropdownvalue(this.value)">
                        <option value="">Select...</option>
                        <option value="salaried">Salaried</option>
                        <option value="selfEmployedProffessional">Self employed Proffessional
                        </option>
                        <option value="selfEmployedNonProffessional">Self Employed Non Professional
                        </option>
                        <option value="others">Others
                        </option>
                        <option value="Real Estate Devlopers">Real Estate Devlopers</option>
                    </select>
                </div>
                <div class="product">
                    <label for="category2">Product</label>
                    <select id="category2">
                        <option value="">Select...</option>
                    </select>
                </div>
                <div class="calculator">
                    <label for="category3">Calculator</label>
                    <select id="category3">
                        <option value="">Select...</option>
                    </select>
                </div>
                <div class="btn">
                    <button onclick="updateCalculator()">Calculate</button>
                </div>
            </div>
            <div id="calculator" class="col-6"></div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const parent1Select = document.getElementById('category1');
            const parent2Select = document.getElementById('category2');
            const childSelect = document.getElementById('category3');

            // Options for the second select based on the selected value of the first select
            function updateParent2Options() {
                const parent1Value = parent1Select.value;
                parent2Select.innerHTML = ''; // Clear existing options
                if (parent1Value === 'salaried') {
                    addChildOption(parent2Select, 'select', 'select');
                    addChildOption(parent2Select, 'Home Loan', 'home loan');
                    addChildOption(parent2Select, 'Mortgages', 'mortgages');
                    addChildOption(parent2Select, 'Affordable Home Loan', 'affordable home Loan');
                    addChildOption(parent2Select, 'Affordable Mortgages', 'affordable mortgages');
                    addChildOption(parent2Select, 'Personal Loan', 'personal loan');
                    addChildOption(parent2Select, 'Education Loan', 'education loan');
                    addChildOption(parent2Select, 'Loan Against Share & Securities', 'loan against share & securities');
                } else if (parent1Value === 'selfEmployedProffessional') {
                    addChildOption(parent2Select, 'select', 'select');
                    addChildOption(parent2Select, 'Home Loan', 'home loan');
                    addChildOption(parent2Select, 'Mortgages', 'mortgages');
                    addChildOption(parent2Select, 'Affordable Home Loan', 'affordable home Loan');
                    addChildOption(parent2Select, 'Affordable Mortgages', 'affordable mortgages');
                    addChildOption(parent2Select, 'Business Loan', 'business loan');
                    addChildOption(parent2Select, 'Personal Loan', 'personal loan');
                    addChildOption(parent2Select, 'Education Loan', 'education loan');
                    addChildOption(parent2Select, 'Loan Against Share & Securities', 'loan against share & securities');
                    addChildOption(parent2Select, 'Working Capital', 'working capital');
                    addChildOption(parent2Select, 'LRD', 'LRD');
                    addChildOption(parent2Select, 'Commercial Purchase', 'commercial purchase');
                } else if (parent1Value === 'selfEmployedNonProffessional') {
                    addChildOption(parent2Select, 'select', 'select');
                    addChildOption(parent2Select, 'Home Loan', 'home loan');
                    addChildOption(parent2Select, 'Mortgages', 'mortgages');
                    addChildOption(parent2Select, 'Affordable Home Loan', 'affordable home Loan');
                    addChildOption(parent2Select, 'Affordable Mortgages', 'affordable mortgages');
                    addChildOption(parent2Select, 'Business Loan', 'business loan');
                    addChildOption(parent2Select, 'Education Loan', 'education loan');
                    addChildOption(parent2Select, 'Machinery Loan', 'machinery loan');
                    addChildOption(parent2Select, 'Loan Against Share & Securities', 'loan against share & securities');
                    addChildOption(parent2Select, 'Working Capital', 'working capital');
                    addChildOption(parent2Select, 'LRD', 'LRD');
                    addChildOption(parent2Select, 'Commercial Purchase', 'commercial purchase');
                    addChildOption(parent2Select, 'Construction Finance', 'construction finance');
                    addChildOption(parent2Select, 'Project Finance', 'project finance');
                } else if (parent1Value === 'others') {
                    addChildOption(parent2Select, 'select', 'select');
                    addChildOption(parent2Select, 'LRD', 'LRD');
                    addChildOption(parent2Select, 'Commercial Purchase', 'commercial purchase');
                    addChildOption(parent2Select, 'Construction Finance', 'construction finance');
                    addChildOption(parent2Select, 'Project Finance', 'project finance');
                }

            }

            // Options for the third select based on the selected values of the first and second selects
            function updateChildOptions() {
                const parent1Value = parent1Select.value;
                const parent2Value = parent2Select.value;
                childSelect.innerHTML = ''; // Clear existing options

                if (parent1Value === 'salaried' && parent2Value === 'home loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Salary Calci', 'salary_calci');
                    addChildOption(childSelect, 'EMI Equilizer', 'emi_equilizer');
                    addChildOption(childSelect, 'EMI Multiplier', 'emi_multipier');
                } else if (parent1Value === 'salaried' && parent2Value === 'mortgages') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Salary Calci', 'salary_calci');
                    addChildOption(childSelect, 'EMI Equilizer', 'emi_equilizer');
                    addChildOption(childSelect, 'EMI Multiplier', 'emi_multipier');
                } else if (parent1Value === 'salaried' && parent2Value === 'business loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'EMI Multiplier', 'emi_multipier');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'home loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'Gross Turnover', 'gross_turnover');
                    addChildOption(childSelect, 'EMI Equilizer', 'emi_equilizer');
                    addChildOption(childSelect, 'EMI Multiplier', 'emi_multipier');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Gross Receipts', 'gross_receipts');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'mortgages') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'Gross Turnover', 'gross_turnover');
                    addChildOption(childSelect, 'EMI Equilizer', 'emi_equilizer');
                    addChildOption(childSelect, 'EMI Multiplier', 'emi_multipier');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Gross Receipts', 'gross_receipts');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'business loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'EMI Multiplier', 'emi_multipier');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'machinery loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'working capital') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'personal loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'commercial purchase') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Gross Receipts', 'gross_receipts');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'affordable home Loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'affordable mortgages') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'education loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'loan against share & securities') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'construction finance') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'LRD') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                } else if (parent1Value === 'selfEmployedProffessional' && parent2Value === 'project finance') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'home loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'Gross Turnover', 'gross_turnover');
                    addChildOption(childSelect, 'EMI Equilizer', 'emi_equilizer');
                    addChildOption(childSelect, 'EMI Multiplier', 'emi_multipier');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'mortgages') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'Gross Turnover', 'gross_turnover');
                    addChildOption(childSelect, 'EMI Equilizer', 'emi_equilizer');
                    addChildOption(childSelect, 'EMI Multiplier', 'emi_multipier');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'business loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'EMI Multiplier', 'emi_multipier');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'machinery loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'working capital') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'personal loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'commercial purchase') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'affordable home Loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'affordable mortgages') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'education loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'loan against share & securities') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'construction finance') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'LRD') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                } else if (parent1Value === 'selfEmployedNonProffessional' && parent2Value === 'project finance') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'others' && parent2Value === 'home loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'Gross Turnover', 'gross_turnover');
                    addChildOption(childSelect, 'Gross Receipts', 'gross_receipts');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'others' && parent2Value === 'mortgages') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'Gross Turnover', 'gross_turnover')
                    addChildOption(childSelect, 'Gross Receipts', 'gross_receipts');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'others' && parent2Value === 'business loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                } else if (parent1Value === 'others' && parent2Value === 'machinery loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                } else if (parent1Value === 'others' && parent2Value === 'working capital') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'others' && parent2Value === 'personal loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'others' && parent2Value === 'commercial purchase') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                    addChildOption(childSelect, 'Gross Receipts', 'gross_receipts');
                } else if (parent1Value === 'others' && parent2Value === 'affordable home Loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'others' && parent2Value === 'affordable mortgages') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Low LTV', 'low_ltv');
                    addChildOption(childSelect, 'Banking 1', 'banking1');
                    addChildOption(childSelect, 'Banking 2', 'banking2');
                    addChildOption(childSelect, 'GST Receipt', 'gst_receipt');
                    addChildOption(childSelect, 'Liquid Income Program', 'liquid_income_program');
                } else if (parent1Value === 'others' && parent2Value === 'education loan') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'others' && parent2Value === 'loan against share & securities') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                } else if (parent1Value === 'others' && parent2Value === 'construction finance') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                } else if (parent1Value === 'others' && parent2Value === 'LRD') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                    addChildOption(childSelect, 'Incomes/ rent Incomes', 'income_rent_incomes');
                } else if (parent1Value === 'others' && parent2Value === 'project finance') {
                    addChildOption(childSelect, 'select', 'select');
                    addChildOption(childSelect, 'Net PAT', 'net_pat');
                }
            }

            // Function to add an option to a select element
            function addChildOption(selectElement, text, value) {
                const option = document.createElement('option');
                option.textContent = text;
                option.value = value;
                selectElement.appendChild(option);
            }

            // Update options in the second select when the first select changes
            parent1Select.addEventListener('change', function() {
                updateParent2Options();
                updateChildOptions(); // Also update the options in the third select based on the new options in the second select
            });

            // Update options in the third select when the second select changes
            parent2Select.addEventListener('change', updateChildOptions);

        });

        function updateCalculator() {
            const cat1 = document.getElementById("category1").value;
            const cat2 = document.getElementById("category2").value;
            const cat3 = document.getElementById("category3").value;
            let calculatorDiv = document.getElementById("calculator");

            calculatorDiv.innerHTML = ""; // Clear existing content
            // if (!cat1 || !cat2 || !cat3) {
            //     outputDiv.innerText = "Please select all categories.";
            //     return;
            // }
            if (cat1 === "salaried" && cat2 === "home loan" && cat3 === "salary_calci"){
                createBasicMathCalculator(calculatorDiv);
                // console.log("hello")
            }
            else if (cat1 === "salaried" && cat2 === "mortgages" && cat3 === "salary_calci") {
                createBasicMathCalculator(calculatorDiv);
                // createAreaCalculator(calculatorDiv);
            }
             else if (cat1 === "selfEmployedProffessional" && cat2 === "home loan" && cat3 === "net_pat") {
                createNetPat(calculatorDiv);
                // createAreaCalculator(calculatorDiv);
            } else if (cat1 === "selfEmployedProffessional" && cat2 === "project finance" && cat3 === "net_pat") {
                createAreaCalculator(calculatorDiv);
            } else {
                // outputDiv.innerText = You selected ${cat1}, ${cat2}, and ${cat3}. No special combination defined.;
            }
        }

        function createBasicMathCalculator(container) {
            let heading = document.createElement("h3", ["Salary Calci"]);
            let num1 = createInput("num1", "number", "Basic Salary-Component Appearing Regularly  100%");
            let num2 = createInput("num2", "number", "Fixed Bonus-Appearing On Slip On Mntly/ Qtr Interva-100% Or Performance Bonus Paid Yearly- 50%");
            let num3 = createInput("num3", "number", "Conveyance - 50%");
            let num4 = createInput("num4", "number", "Lta-50%");
            let num5 = createInput("num5", "number", "Medical-Appearing At Monthly/Qrtrly Intervals - 100% Or Medical Allow. Paid  Qtrly / Half Yrly / Yrly - 50%");
            let num6 = createInput("num6", "number", "Overtime - Avrge Of Latest 3 Salary Slip - Recurring - 50%");
            let num7 = createInput("num7", "number", "Rental Income - 100%");
            let num8 = createInput("num8", "number", "Agricultural Income - Reflected In Latest 2 Itr -50%");
            let num9 = createInput("num9", "number", "Income From Fd - Reflected In Latest 2 Itr - 50%");
            let num10 = createInput("num10", "number", "Foir");
            let num11 = createInput("num11", "number", "Less - Deduction");
            let num12 = createInput("num12", "number", "Rate Of Interest");
            let num13 = createInput("num13", "number", "Tenor Applicable");
            // let operator = createSelect("operator", ["+", "-", "*", "/"]);
            let result = document.createElement("div");
            result.id = "result";
            let result2 = document.createElement("div");
            result2.id = "result2";
            let result3 = document.createElement("div");
            result3.id = "result3";
            let result4 = document.createElement("div");
            result4.id = "result4";
            let result5 = document.createElement("div");
            result5.id = "result5";
            let result6 = document.createElement("div");
            result6.id = "result6";
            heading.innerHTML = "Salary Calci"

            let button = document.createElement("button");
            button.innerText = "Calculate";
            button.onclick = function() {
                let val1 = parseFloat(num1.value);
                let val2 = parseFloat(num2.value);
                let val3 = parseFloat(num3.value);
                let val4 = parseFloat(num4.value);
                let val5 = parseFloat(num5.value);
                let val6 = parseFloat(num6.value);
                let val7 = parseFloat(num7.value);
                let val8 = parseFloat(num8.value);
                let val9 = parseFloat(num9.value);
                let val10 = parseFloat(num10.value);
                let val11 = parseFloat(num11.value);
                let val12 = parseFloat(num12.value);
                let val13 = parseFloat(num13.value);

                let op = val1 + val2 + val3 + val4 + val5 + val6 + val7 + val8 + val9 + val10 + val11 + val12 + val13;
                let foir = val10 * op;
                let net_imcome = foir * val11;
                let emi_per_lakh = val12 / 12 * 100000;
                let max_loan = net_imcome / emi_per_lakh * 100000;
                // let max_loan = net_imcome/
                // let calcResult;
                // if (op === "+") {
                //     calcResult = val1 + val2;
                // } else if (op === "-") {
                //     calcResult = val1 - val2;
                // } else if (op === "*") {
                //     calcResult = val1 * val2;
                // } else if (op === "/") {
                //     calcResult = val1 / val2;
                // }
                result.innerText = " Total Monthly Income: " + op;
                result2.innerText = " Gross Eligible Income: " + op;
                result3.innerText = " Foir (50%): " + foir;
                result4.innerText = " Net Income Available For Current Loan: " + net_imcome;
                result5.innerText = " Emi Per Lakh: " + emi_per_lakh;
                result6.innerText = " Max. Eligible Loan On Foir Basis ( In Rs. ): " + max_loan;
            };
            container.appendChild(heading);
            container.appendChild(num1);
            container.appendChild(num2);
            container.appendChild(num3);
            container.appendChild(num4);
            container.appendChild(num5);
            container.appendChild(num6);
            container.appendChild(num7);
            container.appendChild(num8);
            container.appendChild(button);
            container.appendChild(result);
            container.appendChild(result2);
            container.appendChild(result3);
            container.appendChild(result4);
            container.appendChild(result5);
            container.appendChild(result6);

        }

        function createNetPat(container) {
            let heading = document.createElement("h3", ["Net Pat"]);
            let num1 = createInput("num1", "number", "Profit After Tax-Current Year");
            let num2 = createInput("num2", "number", "Profit After Tax-Previous Year");
            let num3 = createInput("num3", "number", "Directors Salary-Current Year");
            let num4 = createInput("num4", "number", "Director Salary-Previous Year");
            let num5 = createInput("num5", "number", "Intrest On Loans -Current Year");
            let num6 = createInput("num6", "number", "Interest On Loans -Previous Year");
            let num7 = createInput("num7", "number", "Pay To Family Member- Current Year");
            let num8 = createInput("num8", "number", "Pay To Family Member-Previous Year");
            // let num9 = createInput("num9", "number", "Income From Fd - Reflected In Latest 2 Itr - 50%");
            // let num10 = createInput("num10", "number", "Foir");
            // let num11 = createInput("num11", "number", "Less - Deduction");
            // let num12 = createInput("num12", "number", "Rate Of Interest");
            // let num13 = createInput("num13", "number", "Tenor Applicable");
            // let operator = createSelect("operator", ["+", "-", "*", "/"]);
            let result = document.createElement("div");
            result.id = "result";
            // let result2 = document.createElement("div");
            // result2.id = "result2";
            // let result3 = document.createElement("div");
            // result3.id = "result3";
            // let result4 = document.createElement("div");
            // result4.id = "result4";
            // let result5 = document.createElement("div");
            // result5.id = "result5";
            // let result6 = document.createElement("div");
            // result6.id = "result6";
            heading.innerHTML = "Net PAT"

            let button = document.createElement("button");
            button.innerText = "Calculate";
            button.onclick = function() {
                let val1 = parseFloat(num1.value);
                let val2 = parseFloat(num2.value);
                let val3 = parseFloat(num3.value);
                let val4 = parseFloat(num4.value);
                let val5 = parseFloat(num5.value);
                let val6 = parseFloat(num6.value);
                let val7 = parseFloat(num7.value);
                let val8 = parseFloat(num8.value);
                // let val9 = parseFloat(num9.value);
                // let val10 = parseFloat(num10.value);
                // let val11 = parseFloat(num11.value);
                // let val12 = parseFloat(num12.value);
                // let val13 = parseFloat(num13.value);

                let op = (val1 + val3 + val5+val7);
                // let foir = val10 * op;
                // let net_imcome = foir * val11;
                // let emi_per_lakh = val12 / 12 * 100000;
                // let max_loan = net_imcome / emi_per_lakh * 100000;
  
                result.innerText = " Total Profit: " + op;
                // result2.innerText = " Gross Eligible Income: " + op;
                // result3.innerText = " Foir (50%): " + foir;
                // result4.innerText = " Net Income Available For Current Loan: " + net_imcome;
                // result5.innerText = " Emi Per Lakh: " + emi_per_lakh;
                // result6.innerText = " Max. Eligible Loan On Foir Basis ( In Rs. ): " + max_loan;
            };
            container.appendChild(heading);
            container.appendChild(num1);
            container.appendChild(num2);
            container.appendChild(num3);
            container.appendChild(num4);
            container.appendChild(num5);
            container.appendChild(num6);
            container.appendChild(num7);
            container.appendChild(num8);
           
            container.appendChild(button);
            container.appendChild(result);
           
        }

        function createTemperatureConverter(container) {
            let fromUnit = createSelect("from-unit", ["Celsius", "Fahrenheit"]);
            let toUnit = createSelect("to-unit", ["Celsius", "Fahrenheit"]);
            let temperature = createInput("temperature", "number", "Temperature");
            let result = document.createElement("span");
            result.id = "temp-result";

            let button = document.createElement("button");
            button.innerText = "Convert";
            button.onclick = function() {
                let temp = parseFloat(temperature.value);
                let from = fromUnit.value;
                let to = toUnit.value;
                let convertedTemp;

                if (from === "Celsius" && to === "Fahrenheit") {
                    convertedTemp = (temp * 9 / 5) + 32;
                } else if (from === "Fahrenheit" && to === "Celsius") {
                    convertedTemp = (temp - 32) * 5 / 9;
                } else {
                    convertedTemp = temp; // No conversion needed
                }

                result.innerText = " Converted: " + convertedTemp.toFixed(2);
            };

            container.appendChild(fromUnit);
            container.appendChild(toUnit);
            container.appendChild(temperature);
            container.appendChild(button);
            container.appendChild(result);
        }

        function createInput(id, type, placeholder = "") {
            let input = document.createElement("input");
            input.type = type;
            input.id = id;
            input.placeholder = placeholder;
            return input;
        }

        function createSelect(id, options) {
            let select = document.createElement("select");
            select.id = id;
            options.forEach(function(optionText) {
                let option = document.createElement("option");
                option.value = optionText;
                option.innerText = optionText;
                select.appendChild(option);
            });
            return select;
        }
    </script>
    <?php echo view('footer'); ?>