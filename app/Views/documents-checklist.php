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

        /* #condition1, #condition2, #condition3, #condition4{
            display: none;
        } */
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

        .btn, .btn a {
            width: 100%;
            margin: 2rem;
        }

        .btn button, .btn a {
            padding: 0.5rem 0.9rem;
            outline: none;
            border-radius: 10px;
            background-color: #eec11a;
            color:white;
            border: none;
        }

        .btn button:hover, .btn a:hover {
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
            <h1>Documents Checklist</h1>
        </div>
        
        <form action="<?php base_url('get');?>"></form>
        <div class="main mt-5">
            <div class="costomerType">
                <label for="">Customer Type</label>
                <select id="condition1">
                    <option id="Salaried">Salaried</option>
                    <option id="SENP">SENP</option>
                    <option id="SEP">SEPP</option>
                </select>
            </div>
            <?php
            $db = \Config\Database::connect();
            $query = $db->query('SELECT * FROM constitution');
            // Get the results as objects
            $results = $query->getResult();
            ?>
            <div class="constitution">
                <label for="">Constitution</label>
                <select id="condition2">
                    <!-- <option value="all">All</option> -->
                    <?php foreach ($results as $row): ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->title ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
            <?php
            $db = \Config\Database::connect();
            $query = $db->query('SELECT * FROM product');
            $results = $query->getResult();
            ?>
            <div class="product">
                <label for="">Product</label>
                <select id="condition3">
                    <!-- <option value="all">All</option> -->
                    <?php foreach ($results as $row): ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php
            $db = \Config\Database::connect();
            $query = $db->query('SELECT * FROM loantype');
            $results = $query->getResult();
            ?>
            <div class="loanType">
                <label for="">Loan Type (Fresh/BT)</label>
                <select id="condition4">
                    <?php foreach ($results as $row): ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="btn">
       
            <!-- <button onclick="generateReport()">Generate Report</button> -->
            <a value="submit" href="<?php echo base_url('get')?>">Generate Result</a>
        </div>

        <div id="reportContainer"></div>
    </div>

    <script>

// var reportData = [
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "P.P size photo of Individual applicant & Co-borrowers" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Last 3 months salary slips of Individual applicant" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Last 2 years Form 16 of Individual applicant" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "All running loan sanction letters & schedules" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Login cheque" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Property document - Sale & chain sale deeds of the property along with registration receipt" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Property document - Full Occupancy certificate (OC) / Muncipal Corporation Approved Plan and Commencement certificate" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Property document - Share Certificate [Front & Back page] and Society registration certificate" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Current original Sale Agreement + Stamp duty receipt + IndexII + Sub registrar receipt" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "All previous owner's original Sale Agreements + Stamp duty receipts + Registration receipts + Payment receipts (If applicable)" },  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Property document - Property card" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "All previous owner's original Sale Agreements + Stamp duty receipts + Registration receipts + Payment receipts (If applicable)" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Original Share certificate / Society registration certificate (in case Share Certificate not issued)" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "NOC from Society/Builder in bank format" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Stamp duty cheque of 0.3% of loan amount" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "Fresh" , Description: "Latest Electricity Bill, Maintenance bill, Property Tax Paid receipts of the property" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "CP.P size photo of Individual applicant & Co-borrowers" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Last 3 months salary slips of Individual applicant" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Last 2 years Form 16 of Individual applicant" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Statement of account of LAP to be transferred" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Login cheque" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Property document - Sale & chain sale deeds of the property along with registration receipt" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Property document - Full Occupancy certificate (OC) / Muncipal Corporation Approved Plan and Commencement certificate" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Property document - Share Certificate [Front & Back page] and Society registration certificate" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Property document - Property card" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "List of documents and Foreclosure letter from existing Bank/NBFC" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Current original Sale Agreement + Stamp duty receipt + IndexII + Sub registrar receipt" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "All previous owner's original Sale Agreements + Stamp duty receipts + Registration receipts + Payment receipts (If applicable)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Original Share certificate / Society registration certificate (in case Share Certificate not issued)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "NOC from Society/Builder in bank format" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Stamp duty cheque of 0.3% of loan amount" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Loan Against Property", condition4: "BT" , Description: "Latest Electricity Bill, Maintenance bill, Property Tax Paid receipts of the property" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "P.P size photo of Individual applicant & Co-borrowers" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Last 3 months salary slips of Individual applicant" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Last 2 years Form 16 of Individual applicant" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "All running loan sanction letters & schedules" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Login cheque" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Property document - Draft Agreement" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Property document - Old chain agreements of the property along with registration receipt" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Property document - Full Occupancy certificate (OC) / Muncipal Corporation Approved Plan and Commencement certificate" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Property document - Share Certificate [Front & Back page] and Society registration certificate" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Current original Sale Agreement + Stamp duty receipt + IndexII + Sub registrar receipt + floor plan" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Own payment receipts (Agreement value - Loan amount)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Bank statement reflecting clearance of your payment" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "NOC from builder in bank format" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Cancelled cheque of the builder" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Demand letter / Cost sheet on builder letterhead" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Disbursement request letter" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "Stamp duty cheque of 0.3% of loan amount + Cersai fees" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Builder Purchase" , Description: "TDS challan (if applicable)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "P.P size photo of Individual applicant & Co-borrowers" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Last 3 months salary slips of Individual applicant" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Last 2 years Form 16 of Individual applicant" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "All running loan sanction letters & schedules" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Login cheque" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Property document - Draft Agreement" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Property document - Old chain agreements of the property along with registration receipt" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Property document - Full Occupancy certificate (OC) / Muncipal Corporation Approved Plan and Commencement certificate" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Property document - Property card" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Property document - Share Certificate [Front & Back page] and Society registration certificate" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Property document - Property cardProperty document - Property card" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Current original Sale Agreement + Stamp duty receipt + IndexII + Sub registrar receipt" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Own payment receipts (Agreement value - Loan amount)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Bank statement reflecting clearance of your payment" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "All previous owner's original Sale Agreements + Stamp duty receipts + Registration receipts + Payment receipts " },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Original Share certificate / Society registration certificate (in case Share Certificate not issued)" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "NOC from Society/Builder in bank format" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Seller's PAN card and cancelled Cheque" },
//  {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Stamp duty cheque of 0.3% of loan amount" },
//   {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "1% TDS paid challan (if AV is more than Rs 50 Lakhs)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Commercial Property Purchase", condition4: "Resale Purchase" , Description: "Latest Electricity Bill, Maintenance bill, Property Tax Paid receipts of the property" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "P.P size photo of Individual applicant & Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Last 3 months salary slips of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Last 2 years Form 16 of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "All running loan sanction letters & schedules" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Login cheque" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Property document - Draft Agreement" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Property document - Old chain agreements of the property along with registration receipt" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Property document - Full Occupancy certificate (OC) / Muncipal Corporation Approved Plan and Commencement certificate " },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Property document - Share Certificate [Front & Back page] and Society registration certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Current original Sale Agreement + Stamp duty receipt + IndexII + Sub registrar receipt + floor plan" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Own payment receipts (Agreement value - Loan amount)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Bank statement reflecting clearance of your payment" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "NOC from builder in bank format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Cancelled cheque of the builder" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Demand letter / Cost sheet on builder letterhead" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Disbursement request letter" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "Stamp duty cheque of 0.3% of loan amount + Cersai fees" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Builder Purchase" , Description: "TDS challan (if applicable)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "P.P size photo of Individual applicant & Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Last 3 months salary slips of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Last 2 years Form 16 of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "All running loan sanction letters & schedules" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Login cheque" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Property document - Draft Agreement" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Property document - Old chain agreements of the property along with registration receipt" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Property document - Full Occupancy certificate (OC) / Muncipal Corporation Approved Plan and Commencement certificate " },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Property document - Share Certificate [Front & Back page] and Society registration certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Property document - Property card" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Current original Sale Agreement + Stamp duty receipt + IndexII + Sub registrar receipt" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Own payment receipts (Agreement value - Loan amount)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Bank statement reflecting clearance of your payment" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "All previous owner's original Sale Agreements + Stamp duty receipts + Registration receipts + Payment receipts " },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Original Share certificate / Society registration certificate (in case Share Certificate not issued)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "NOC from Society/Builder in bank format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Seller's PAN card and cancelled Cheque" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Stamp duty cheque of 0.3% of loan amount" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "1% TDS paid challan (if AV is more than Rs 50 Lakhs)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "Resale Purchase" , Description: "Latest Electricity Bill, Maintenance bill, Property Tax Paid receipts of the property" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "P.P size photo of Individual applicant & Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Last 3 months salary slips of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Last 2 years Form 16 of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "All running loan sanction letters & schedules" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Statement of account of Home loan to be transferred" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Login cheque" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Property document - Sale & chain sale deeds of the property along with registration receipt" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Property document - Full Occupancy certificate (OC) / Muncipal Corporation Approved Plan and Commencement certificate " },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Property document - Share Certificate [Front & Back page] and Society registration certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Property document - Property card" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "List of documents and Foreclosure letter from existing Bank/NBFC" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Current original Sale Agreement + Stamp duty receipt + IndexII + Sub registrar receipt" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "All previous owner's original Sale Agreements + Stamp duty receipts + Registration receipts + Payment receipts (If applicable)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Original Share certificate / Society registration certificate (in case Share Certificate not issued)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "NOC from Society/Builder in bank format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Stamp duty cheque of 0.3% of loan amount" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Home Loan", condition4: "BT" , Description: "Latest Electricity Bill, Maintenance bill, Property Tax Paid receipts of the property" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "P.P size photo of Individual applicant & Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Last 3 months salary slips of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Last 2 years Form 16 of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "All running loan sanction letters & schedules" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Login cheque" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Property document - Registered Rent/Lease Agreement" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Property document - MOU with intent letter (if required)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Property document - Sale & chain sale deeds of the property along with registration receipt" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Property document - Full Occupancy certificate (OC) / Muncipal Corporation Approved Plan and Commencement certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Property document - Share Certificate [Front & Back page] and Society registration certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Property document - Property card" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "All previous owner's original Sale Agreements + Stamp duty receipts + Registration receipts + Payment receipts (If applicable)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Original Share certificate / Society registration certificate (in case Share Certificate not issued)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "NOC from Society/Builder in bank format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Stamp duty cheque of 0.3% of loan amount" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Latest Electricity Bill, Maintenance bill, Property Tax Paid receipts of the property" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "Fresh" , Description: "Current original Sale Agreement + Stamp duty receipt + IndexII + Sub registrar receipt" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "P.P size photo of Individual applicant & Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Last 3 months salary slips of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Last 2 years Form 16 of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "All running loan sanction letters & schedules" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Statement of account of LRD to be transferred" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Login cheque" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Property document - Registered Rent/Lease Agreement" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Property document - MOU with intent letter (if required)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Property document - Sale & chain sale deeds of the property along with registration receipt" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Property document - Full Occupancy certificate (OC) / Muncipal Corporation Approved Plan and Commencement certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Property document - Share Certificate [Front & Back page] and Society registration certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Property document - Property card" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "List of documents and Foreclosure letter from existing Bank/NBFC" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Current original Sale Agreement + Stamp duty receipt + IndexII + Sub registrar receipt" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "All previous owner's original Sale Agreements + Stamp duty receipts + Registration receipts + Payment receipts (If applicable)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Original Share certificate / Society registration certificate (in case Share Certificate not issued)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "NOC from Society/Builder in bank format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Stamp duty cheque of 0.3% of loan amount" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Lease Rental Discounting", condition4: "BT" , Description: "Latest Electricity Bill, Maintenance bill, Property Tax Paid receipts of the property" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "Current Job Appointment letter and Experience/ Employment Certificate" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "PAN card and Aadhar card of Individual applicant and Co-borrowers " },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "Residence address proof - Latest Electricity and Rent agreement (if property is rented)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "Ownership proof - Electricity Bill/ Maintenance Bill/ Index II/Sale Agreement of property on name of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "P.P size photo of Individual applicant & Co-borrowers" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "Last 3 months salary slips of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "Last 2 years Form 16 of Individual applicant" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "ITR (Saral) & Computation of Income of Individual applicant & Co-borrowers of last 2 years (FY 21-22 & FY 22-23)" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "Bank statements of last 12 months till date of all personal accounts in PDF format" },
//    {condition1: "Salaried", condition2: "Individual", condition3: "Auto Loan", condition4: "Fresh" , Description: "All running loan sanction letters & schedules" },
// //   {condition1: "Salaried", condition2: "proprietorship", condition3: "machinery loan", condition4: "resale purchase"  },
// //   {condition1: "senp", condition2: "company", condition3: "takeover", condition4: "home loan"  }
// ];

// // Function to generate the report based on selected conditions
// function generateReport() {
//   var condition1 = document.getElementById('condition1').value;
//   var condition2 = document.getElementById('condition2').value;
//   var condition3 = document.getElementById('condition3').value;
//   var condition4 = document.getElementById('condition4').value;

//   var filteredData = reportData.filter(function(item) {
//     return item.condition1 === condition1 && item.condition2 === condition2 && item.condition3 === condition3 && item.condition4 === condition4;
//     // return condition1.style.display === 'none'
//   });

//   renderReport(filteredData);
// }

// // Function to render the report in the HTML
// function renderReport(data) {
//   var reportContainer = document.getElementById('reportContainer');
//   reportContainer.innerHTML = '';

//   if (data.length === 0) {
//     reportContainer.innerHTML = 'No data found for selected conditions.';
//     return;
//   }

//   var table = document.createElement('table');
//   var headerRow = table.insertRow();
//   Object.keys(data[0]).forEach(function(key) {
//     var th = document.createElement('th');
//     th.textContent = key;
//     headerRow.appendChild(th);
//   });

//   data.forEach(function(item) {
//     var row = table.insertRow();
//     Object.values(item).forEach(function(value) {
//       var cell = row.insertCell();
//       cell.textContent = value;
//     });
//   });

//   reportContainer.appendChild(table);
// }

// // Initially generate the report based on default selected conditions
// generateReport();
    </script>

</body>

</html>

<?php echo view('footer'); ?>