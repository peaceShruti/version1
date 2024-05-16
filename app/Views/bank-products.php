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
                <select name="condition2">
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
                <select name="condition3">
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
                <select name="condition4">
                    <?php foreach ($results as $row): ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>