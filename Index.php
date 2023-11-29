<?php
    //เลือก EMPNO 
    $defaultEmpno = '21146';

    // Fetch data using file_get_contents
    $url = "https://sheet.best/api/sheets/779a3454-65c1-4864-ba55-96c632f7e014";
    $json = file_get_contents($url);

    // Convert JSON to array
    $result = json_decode($json, true);

    // Handle form submission
    $filteredData = [];

    // ตรวจสอบว่ามีการส่งค่า EMPNO มาหรือไม่
    if (isset($_POST['empno'])) {
        // Get EMPNO from the form submission
        $empno = $_POST['empno'];

        // Filter the data based on the EMPNO
        $filteredData = array_filter($result, function($item) use ($empno) {
            return $item['EMPNO'] == $empno;
        });

        // Reset array keys to start from 0
        $filteredData = array_values($filteredData);
    } else {
        // ถ้าไม่มีการส่งค่า EMPNO มา, ใช้ EMPNO ที่กำหนดในโค้ด
        $filteredData = array_filter($result, function($item) use ($defaultEmpno) {
            return $item['EMPNO'] == $defaultEmpno;
        });

        // Reset array keys to start from 0
        $filteredData = array_values($filteredData);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>รายงานข้อมูล</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt&family=Roboto&display=swap');
        * {
            font-family: 'Prompt', sans-serif;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        caption {
            margin-bottom: 20px;
            font-size: 32px; /* กำหนดขนาดตัวอักษร */
            font-weight: bold; /* ทำให้ตัวอักษรตัวหนา */
        }

        .table-container {
            width: 80%;
            overflow-x: auto;
            /* เพิ่มคุณสมบัติ overflow-x เพื่อให้มีแถบเลื่อนในกรณีที่ตารางมีขนาดใหญ่เกินกว่าหน้าจอ */
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .center-align {
            text-align: center;
        }

    </style> 
</head>
<body>
    <div class="table-container">
    <center>
        <table width="850" border="1">
            <caption><?php echo $filteredData[0]['F_NAME']; ?>  <?php echo $filteredData[0]['S_NAME']; ?></caption>
            <thead> 
                    <th width="50"><center>EMPNO</center></th>
                    <th width="300"><center>หลักสูตร</center></th>
                    <th width="200"><center>เลขที่</center></th>
                    <th width="150"><center>ผลตรวจสุขภาพ</center></th>
                    <th width="150"><center>วันหมดอายุ</center></th>
                    <!-- เพิ่มคอลัมน์ตามที่ต้องการ -->
                </tr>
            </thead>
            <tbody>
                    <?php foreach($filteredData as $item): ?>
                        <tr>
                            <td class="center-align"><?php echo $item['EMPNO']; ?></td>
                            <td class="center-align"><?php echo $item['IDTRAINING']; ?></td>
                            <td class="center-align"><?php echo $item['NOCERTIFICATE']; ?></td>
                            <td class="center-align"><?php echo $item['HEALTHRESULTS']; ?></td>
                            <td class="center-align"><?php echo $item['EXPDATE']; ?></td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table> 
    </center>
    </div>
</body>
</html>
