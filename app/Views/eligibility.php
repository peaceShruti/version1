<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dynamic Calculator Selector</title>
    <script>
        function updateCalculator() {
            const cat1 = document.getElementById("category1").value;
            const cat2 = document.getElementById("category2").value;
            const cat3 = document.getElementById("category3").value;
            var calculatorDiv = document.getElementById("calculator");

            calculatorDiv.innerHTML = ""; // Clear existing content
            // if (!cat1 || !cat2 || !cat3) {
            //     outputDiv.innerText = "Please select all categories.";
            //     return;
            // }

            if (cat1 === "1" && cat2 === "B" && cat3 === "cal1") {
                createTemperatureConverter(calculatorDiv);
                // console.log("hello")
            } else if (cat1 === "3" && cat2 === "A" && cat3 === "cal2") {
                createAreaCalculator(calculatorDiv);
            } else {
                // outputDiv.innerText = You selected ${cat1}, ${cat2}, and ${cat3}. No special combination defined.;
            }
        }

        function createBasicMathCalculator(container) {
            var num1 = createInput("num1", "number");
            var num2 = createInput("num2", "number");
            var operator = createSelect("operator", ["+", "-", "*", "/"]);
            var result = document.createElement("span");
            result.id = "result";

            var button = document.createElement("button");
            button.innerText = "Calculate";
            button.onclick = function() {
                var val1 = parseFloat(num1.value);
                var val2 = parseFloat(num2.value);
                var op = operator.value;

                var calcResult;
                if (op === "+") {
                    calcResult = val1 + val2;
                } else if (op === "-") {
                    calcResult = val1 - val2;
                } else if (op === "*") {
                    calcResult = val1 * val2;
                } else if (op === "/") {
                    calcResult = val1 / val2;
                }
                result.innerText = " Result: " + calcResult;
            };

            container.appendChild(num1);
            container.appendChild(operator);
            container.appendChild(num2);
            container.appendChild(button);
            container.appendChild(result);
        }

        function createAreaCalculator(container) {
            var shape = createSelect("shape", ["Square", "Rectangle", "Circle"]);
            var side1 = createInput("side1", "number", "Side 1");
            var side2 = createInput("side2", "number", "Side 2");
            var result = document.createElement("span");
            result.id = "area-result";

            var button = document.createElement("button");
            button.innerText = "Calculate";
            button.onclick = function() {
                var shapeValue = shape.value;
                var calcResult;

                if (shapeValue === "Square") {
                    var side = parseFloat(side1.value);
                    calcResult = side * side;
                } else if (shapeValue === "Rectangle") {
                    var length = parseFloat(side1.value);
                    var width = parseFloat(side2.value);
                    calcResult = length * width;
                } else if (shapeValue === "Circle") {
                    var radius = parseFloat(side1.value);
                    calcResult = Math.PI * radius * radius;
                }

                result.innerText = " Area: " + calcResult.toFixed(2);
            };

            container.appendChild(shape);
            container.appendChild(side1);
            if (shape.value === "Rectangle") {
                container.appendChild(side2);
            }
            container.appendChild(button);
            container.appendChild(result);

            shape.onchange = function() {
                if (shape.value === "Rectangle") {
                    side2.style.display = "inline";
                } else {
                    side2.style.display = "none";
                }
            };
        }

        function createTemperatureConverter(container) {
            var fromUnit = createSelect("from-unit", ["Celsius", "Fahrenheit"]);
            var toUnit = createSelect("to-unit", ["Celsius", "Fahrenheit"]);
            var temperature = createInput("temperature", "number", "Temperature");
            var result = document.createElement("span");
            result.id = "temp-result";

            var button = document.createElement("button");
            button.innerText = "Convert";
            button.onclick = function() {
                var temp = parseFloat(temperature.value);
                var from = fromUnit.value;
                var to = toUnit.value;
                var convertedTemp;

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
            var input = document.createElement("input");
            input.type = type;
            input.id = id;
            input.placeholder = placeholder;
            return input;
        }

        function createSelect(id, options) {
            var select = document.createElement("select");
            select.id = id;
            options.forEach(function(optionText) {
                var option = document.createElement("option");
                option.value = optionText;
                option.innerText = optionText;
                select.appendChild(option);
            });
            return select;
        }
    </script>
</head>

<body>
    <!-- <h1>Dynamic Calculator Selector</h1>
    <p>
        Choose a calculator type:
        <select id="calculator-type" onchange="updateCalculator()">
            <option value="basic-math">Basic Math</option>
            <option value="area-calculator">Area Calculator</option>
            <option value="temperature-converter">Temperature Converter</option>
        </select>
    </p>
    <div id="calculator"></div> -->

    <div class="container">
        <div class="heading">
            <h1>Bank Products</h1>
        </div>
        <div class="row">
            <div class="main col-6 flex-direction-column">
                <div class="costomerType">
                    <label for="category1">Customer Type</label>
                    <select id="category1">
                        <option value="1">Salaried</option>
                        <option value="2">Self employed Proffessional -CA,
                            Doctors , CS, CFA
                        </option>
                        <option value="3">Self Employed Non Professional>
                        </option>
                        <option value="4">Others - Public Limited
                            companies, Trust , Schools , NBFC

                        </option>
                        <option value="Real Estate Devlopers">Real Estate Devlopers</option>
                    </select>
                </div>
                <div class="product">
                    <label for="category2">Product</label>
                    <select id="category2">
                        <!-- <option value="all">All</option> -->
                        <option value="A">Home Loan</option>
                        <option value="B">Mortgages</option>
                        <option value="C">Affordable Home Loan</option>
                        <option value="D">Business loan</option>
                        <option value="E">Personal Loan</option>
                        <option value="F">Education Loans</option>
                        <option value="G">Machinery Loan</option>
                        <option value="H">Working Capital</option>
                        <option value="I">LRD</option>
                        <option value="J">loan Against Shares & Securities</option>
                        <option value="K">Commercial Purchase</option>
                        <option value="L  ">Construction finance </option>
                        <option value="M ">Project finance</option>
                    </select>
                </div>
                <div class="calculator">
                    <label for="category3">Calculator</label>
                    <select id="category3">
                        <!-- <option value="all">All</option> -->
                        <option value="cal1">RNP_PNP_PMT_SAL</option>
                        <option value="cal2">RNP_PNP_PMT_SE</option>
                        <option value="cal3">LIP</option>
                        <option value="cal4">GTP</option>
                        <option value="cal5">GRP</option>
                        <option value="cal6">BKP</option>
                        <option value="cal7">LLP</option>
                        <option value="cal8">EEP</option>
                        <option value="cal9">RMT</option>
                        <option value="cal10">MELAP</option>
                        <option value="cal11">WC</option>
                        <option value="cal12">LC</option>
                    </select>
                </div>
                <div class="btn">
                    <button onclick="updateCalculator()">Calculate</button>
                </div>
            </div>
            <div id="calculator" class="col-6"></div>
        </div>
    </div>
</body>

</html>