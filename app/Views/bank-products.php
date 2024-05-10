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
            align-items: center;
        }

        .costomerType,
        .constitution,
        .product,
        .loanType {
            display: flex;
            flex-direction: column;
            width: 15%;
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
            width: 100%;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="heading">
            <h1>Bank Products</h1>
        </div>

        <div class="main mt-5">
            <div class="costomerType">
                <label for="">Customer Type</label>
                <select id="condition1">
                    <option value="Salaried">Salaried</option>
                    <option value="Self employed Proffessional - CA, Doctors , CS, CFA">Self employed Proffessional -CA,
                        Doctors , CS, CFA
                    </option>
                    <option value="Self Employed Non Professional">Self Employed Non Professional
                    </option>
                    <option value="Others - Public Limited companies, Trust , Schools , NBFC">Others - Public Limited
                        companies, Trust , Schools , NBFC

                    </option>
                    <option value="Real Estate Devlopers">Real Estate Devlopers


                    </option>
                </select>
            </div>
            <div class="product">
                <label for="">Product</label>
                <select id="condition2">
                    <!-- <option value="all">All</option> -->
                    <option value="Home Loan">Home Loan</option>
                    <option value="Mortgages">Mortgages</option>
                    <option value="Affordable Home Loan">Affordable Home Loan</option>
                    <option value="Business loan">Business loan</option>
                    <option value="Personal Loan">Personal Loan</option>
                    <option value="Education Loans">Education Loans</option>
                    <option value="Machinery Loan">Machinery Loan</option>
                    <option value="Working Capital">Working Capital</option>
                    <option value="LRD">LRD</option>
                    <option value="loan Against Shares & Securities">loan Against Shares & Securities</option>
                    <option value="Commercial Purchase">Commercial Purchase</option>
                    <option value="Construction finance ">Construction finance </option>
                    <option value="Project finance">Project finance</option>
                </select>
            </div>
            <div class="calculator">
                <label for="">calculator</label>
                <select id="condition3">
                    <!-- <option value="all">All</option> -->
                    <option value="RNP_PNP_PMT_SAL">RNP_PNP_PMT_SAL</option>
                    <option value="RNP_PNP_PMT_SE">RNP_PNP_PMT_SE</option>
                    <option value="LIP">LIP</option>
                    <option value="GTP">GTP</option>
                    <option value="GRP">GRP</option>
                    <option value="BKP">BKP</option>
                    <option value="LLP">LLP</option>
                    <option value="EEP">EEP</option>
                    <option value="RMT">RMT</option>
                    <option value="MELAP">MELAP</option>
                    <option value="WC">WC</option>
                    <option value="LC">LC</option>
                </select>
            </div>
        </div>
        <div class="btn">
            <button onclick="generateReport()">calculate</button>

        </div>

        <div id="reportContainer"></div>
    </div>

    <?php echo view('footer'); ?>