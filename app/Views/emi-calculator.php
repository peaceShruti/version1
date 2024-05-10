<?php echo view('header'); ?>

<!DOCTYPE html>
<html lang="en">

<script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
<style>
    .button {
        border: none;
        outline: none;
        padding: 10px 16px;
        /* color: #666; */
        cursor: pointer;
        font-size: 18px;
    }

    .button:focus {
        outline: none;
        border-color: none;

    }

    .active,
    .button:hover {
        background-color: white;
        color: #666;
    }

    #container1 {
        /* background: rgb(233, 232, 232); */
        margin-top: 30px;
        margin-bottom: 30px;
    }

    #title {
        text-align: center;
        padding: 20px 0;
    }

    #mydiv {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
    }

    .label,
    .reult {
        font-size: 20px;
        font-weight: 600;
    }

    .output {
        font-size: 22px;
        font-weight: 600;
        margin-left: 20px;
    }

    .result {
        font-size: 18px;
    }

    #container {
        width: 500px;
        height: 300px;
    }

    #content {
        display: none;
        position: relative;
        animation: moveBox 2s ease-in-out infinite alternate;
        transform: rotate(360deg)
    }

    .whatapp_img {
        transform: translate(-10px, 5px);
    }

    .email_img {
        transform: translate(10px, 5px);
    }

    #share {
        padding: 0.6rem 2rem;
        font-size: 1.3rem;
    }

    .share_logo {
        width: 65px;
        box-shadow: #666;
    }

    .share_logo img {
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
    }

    @media only screen and (max-width: 600px) {
        #container {
            width: 250px;
            height: 200px;
        }

        .sliderticks .amount-val {
            display: none;
        }
    }

    @media only screen and (min-width:600px) {
        #container {
            width: 300px;
            height: 250px;
        }

    }

    @media only screen and (min-width:1300px) {
        #container {
            width: 600px;
            height: 300px;
        }
    }

    .sliderticks {
        display: flex;
        justify-content: space-between;
        padding: 0 10px;
    }

    .sliderticks p {
        position: relative;
        display: flex;
        justify-content: center;
        text-align: center;
        width: 1px;
        background: #d3d3d3;
        height: 10px;
        line-height: 40px;
        margin: 0 0 20px 0;
        font-size: 10px;
    }

    input[type='range'] {
        -webkit-appearance: none;
        background-color: #c7c7c7;
        height: 8px;
        overflow: hidden;
        width: 100%;
        border-radius: 10px;
    }

    input[type='range']::-webkit-slider-runnable-track {
        -webkit-appearance: none;
        height: 20px;
    }

    input[type='range']::-webkit-slider-thumb {
        -webkit-appearance: none;
        background: #1d4585;
        border-radius: 50%;
        box-shadow: -300px 0 0 290px #1d4585;
        cursor: pointer;
        height: 15px;
        width: 15px;
        border: 0;
    }

    input[type='range']::-moz-range-thumb {
        background: #1d4585;
        border-radius: 50%;
        box-shadow: -1010px 0 0 1000px #1d4585;
        cursor: pointer;
        height: 20px;
        width: 20px;
        border: 0;
    }

    /* input[type="range"]::-moz-range-track {
            background-color: red;
        }

        input[type="range"]::-moz-range-progress {
            background-color: red;
            height: 20px;
        }

        input[type="range"]::-ms-fill-upper {
            background-color: red;
        }

        input[type="range"]::-ms-fill-lower {
            background-color: red;
        } */



    .submit button,
    .submit button:hover {
        background: #1d4585;
        color: white;
    }

    @media print {

        #share,
        .navbar,
        #footer {
            display: none;
        }
    }
</style>

</head>

<body>

    <div class="container" id="container1">
        <h2 class="heading">EMI CALCULATOR</h2>
        <!-- <div class="row">
            <div class="col-md-12">
                <div id="mydiv">
                    <button type="submit" id="homeid" onclick="home_loan()" class="btn button active m-2">HOME
                        LOAN</button>
                    <button type="submit" id="carid" onclick="car_loan()" class="btn button m-2">CAR LOAN</button>
                    <button type="submit" id="personalid" onclick="personal_loan()" class="btn button m-2">PERSONAL
                        LOAN</button>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div class="row section mb-3">
                        <!--loan amount with input-->
                        <div class="col-6">
                            <label id="loanamount" class="form-label label">Loan Amount:</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input type="number" class="form-control input" id="value1"
                                    placeholder="Enter Loan amount.." value="" onchange="amt_fun1()"></input>
                                <span class="input-group-text"> ₹ </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="range">
                                <input type="range" id="range1" min="0" max="20000000" value="2" class="slider"
                                    onchange="range_fun1()">
                                <div class="sliderticks">
                                    <p>0</p>
                                    <p class="amount-val">25L</p>
                                    <p>50L</p>
                                    <p class="amount-val">75L</p>
                                    <p>100L</p>
                                    <p class="amount-val">125L</p>
                                    <p>150L</p>
                                    <p class="amount-val">175L</p>
                                    <p>200L</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row section mb-3">
                        <!--interest rate with input-->
                        <div class="col-6">
                            <label id="interestrate" class="form-label label">Interest Rate:</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input type="number" class="form-control input" id="value2"
                                    placeholder="Enter IR per year.." value="" onchange="amt_fun2()"></input>
                                <span class="input-group-text"> % </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="range">
                                <input type="range" id="range2" min="5" max="20" step="0.5" value="2" class="slider"
                                    onchange="range_fun2()">
                                <div class="sliderticks">
                                    <p>5</p>
                                    <p>7.5</p>
                                    <p>10</p>
                                    <p>12.5</p>
                                    <p>15</p>
                                    <p>17.5</p>
                                    <p>20</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row section mb-3">
                        <!--interest rate with input-->
                        <div class="col-6">
                            <label id="loanduration" class="form-label label">Loan Duration:</label>
                            <p>(Max 30 Years)</p>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input type="number" class="form-control input" id="value3"
                                    placeholder="Enter loan duration.." value="" min="0" max="30"
                                    onchange="amt_fun3()"></input>
                                <span class="input-group-text"> Yr </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="range">
                                <input type="range" id="range3" min="0" max="30" value="2" class="slider" step="0.5"
                                    onchange="range_fun3()">
                                <div class="sliderticks">
                                    <p>0</p>
                                    <p>5</p>
                                    <p>10</p>
                                    <p>15</p>
                                    <p>20</p>
                                    <p>25</p>
                                    <p>30</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 submit">
                            <button type="submit" class="btn  mb-3" id="calc" onclick="calculation()">Calculate
                                EMI</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="result">EMI Amount: </div>
                        </div>
                        <div class="col-sm-6">
                            <span id="emi-amount" class="output"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="result">Total Intrest: </div>
                        </div>
                        <div class="col-sm-6">
                            <span id="intrest-payable" class="output"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="result">Total Payment: </div>
                        </div>
                        <div class="col-sm-6">
                            <span id="total-payment" class="output"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="container"></div>
                        </div>
                    </div>
                </div>
                <div class="row py-4 mt-5">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn bg_color" id="share">Share</button>
                    </div>
                    <div class="col-md-12 text-center mt-2 toggle" id="content">
                        <img src="<?= base_url('assets/images/wp.png') ?>" alt="whatapp image" id="wp_click"
                            class="whatapp_img m-4 share_logo" onclick="redirectToWhatsApp()">
                        <img src="<?= base_url('assets/images/mail.png') ?>" alt="email image" id="email_click"
                            class="email_img m-4 share_logo" onclick="redirectToMail()">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function reset() {
            document.getElementById("value1").value = 0;
            document.getElementById("value2").value = 0;
            document.getElementById("value3").value = 0;


            document.getElementById("emi-amount").innerHTML = 0;
            document.getElementById("intrest-payable").innerHTML = 0;
            document.getElementById("total-payment").innerHTML = 0;
        }

        function calculation() {
            //..............Declaration........................

            var loanAmount = document.getElementById("value1").value;
            var interestRate = document.getElementById("value2").value;
            var loanDuration = document.getElementById("value3").value;


            //.......... Calculations.............

            var year = loanDuration * 12;
            var monthlyRate = interestRate / (12 * 100);

            var onePlusR = Math.pow(1 + monthlyRate, year);

            var denominator = onePlusR - 1;

            var emi = (loanAmount * monthlyRate * (onePlusR / denominator)).toFixed(2);
            var totalAmt = year * parseFloat(emi).toFixed(2);
            // var totalAmt = totalAmt1 +fees_charges;
            var totalInt = Math.floor(totalAmt - loanAmount);

            var Principal = (totalAmt - totalInt);

            // console.log(emi);
            // console.log(totalAmt);
            // console.log(totalInt);


            //--------------OUTPUT ------------------------


            document.getElementById("emi-amount").innerHTML = "₹ " + emi;
            document.getElementById("intrest-payable").innerHTML = "₹ " + totalInt;
            document.getElementById("total-payment").innerHTML = "₹ " + totalAmt;

            //...........................Pie Chart ............

            document.getElementById('container').innerHTML = '';
            var data = [{
                x: "Total Intrest Payable",
                value: totalInt
            },

            {
                x: "Principal Laon Amount",
                value: Principal
            }
            ]

            // create the chart
            var chart = anychart.pie();

            // set the chart title
            chart.title("EMI");

            // add the data
            chart.data(data);

            // display the chart in the container
            chart.container('container');
            chart.draw();

        }

        function personal_loan() {
            console.log('Personal :Lone')
            document.getElementById("value1").value = 10000000;
            document.getElementById("range1").value = 10000000;
            document.getElementById("value2").value = 12.5;
            document.getElementById("range2").value = 12.5;
            document.getElementById("value3").value = 15;
            document.getElementById("range3").value = 15;
            document.getElementsByClassName('container').innerHTML = "";
            calculation();
        }

        function home_loan() {
            console.log('home :Lone')
            document.getElementById("value1").value = 10000000;
            document.getElementById("range1").value = 10000000;
            document.getElementById("value2").value = 12.5;
            document.getElementById("range2").value = 12.5;
            document.getElementById("value3").value = 15;
            document.getElementById("range3").value = 15;
            calculation();
        }

        function car_loan() {
            console.log('Car :Lone')
            document.getElementById("value1").value = 10000000;
            document.getElementById("range1").value = 10000000;
            document.getElementById("value2").value = 12.5;
            document.getElementById("range2").value = 12.5;
            document.getElementById("value3").value = 15;
            document.getElementById("range3").value = 15;
            calculation();
        }

        //..........OnReady functon.............................//
        document.addEventListener("DOMContentLoaded", function (event) {
            home_loan();
        })



        // Add active class to the current button (highlight it)

        // var header = document.getElementById("mydiv");
        // var btns = header.getElementsByClassName("button");
        // for (var i = 0; i < btns.length; i++) {
        //     btns[i].addEventListener("click", function () {
        //         var current = document.getElementsByClassName("active");
        //         current[0].className = current[0].className.replace(" active", "");
        //         this.className += " active";
        //     });
        // }

        function range_fun1() {
            var range = document.getElementById('range1').value
            document.getElementById('value1').value = range
        }

        function amt_fun1() {
            var range = document.getElementById('value1').value
            document.getElementById('range1').value = range
        }

        function range_fun2() {
            var range = document.getElementById('range2').value
            document.getElementById('value2').value = range
        }

        function amt_fun2() {
            var range = document.getElementById('value2').value
            document.getElementById('range2').value = range
        }

        function range_fun3() {
            var range = document.getElementById('range3').value
            document.getElementById('value3').value = range
        }

        function amt_fun3() {
            var range = document.getElementById('value3').value
            document.getElementById('range3').value = range
        }

    </script>
    <script>
        document.getElementById("share").addEventListener("click", function () {
            let content = document.getElementById("content");
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    </script>
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    <script>
        // redirecting to wp
        function redirectToWhatsApp() {
            // Define the WhatsApp phone number and message
            var phoneNumber = "<h2>Send the following on WhatsApp</h2>"; // Replace with the phone number you want to message
            var message = window.print(); // Replace with the message you want to send

            // Construct the WhatsApp API link
            // var whatsappLink = "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(message);

            // Redirect the user to WhatsApp
            window.location.href = whatsappLink;

        }

        // redireting to email
        function redirectToMail() {
            // Define the recipient email address, subject, and body
            var emailAddress = "recipient@example.com"; // Replace with the recipient's email address
            var subject = "Subject"; // Replace with the email subject
            var body = "Message body"; // Replace with the email body

            // Construct the mailto link
            var mailtoLink = "mailto:" + encodeURIComponent(emailAddress) + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);

            // Redirect the user to the default email client
            window.location.href = mailtoLink;
            window.print();
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#email_click').click(function() {
                window.print();
            });
        });
    </script>

</body>

</html>

<?php echo view('footer'); ?>