//https://api.sheety.co/274046c17d8bb184967cef7fb4dd2485/listtrainTest/sheet1
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
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style> 
</head>
<body>

    <h1>ข้อมูลเอามาจากไหนโว้ยยยยย</h1>
    <h2><center>ชื่อ........นามสกุล........</center></h2>
    <center>
        <table width="850" border="1">
            <thead> 
                <tr>
                    <th width="50"><center>ID</center></th>
                    <th width="300"><center>หลักสูตร</center></th>
                    <th width="200"><center>เลขที่</center></th>
                    <th width="150"><center>ผลตรวจสุขภาพ</center></th>
                    <th width="150"><center>วันหมดอายุ</center></th>
                    <!-- เพิ่มคอลัมน์ตามที่ต้องการ -->
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($result)) : ?>
                    <?php foreach($result as $key => $value): ?>
                    <tr>
                        <td><?php echo $value->ID; ?></td>
                        <td><?php echo $value->Gender; ?></td>
                        <td><?php echo $value->Telephone; ?></td>
                        <td><?php echo $value->Email; ?></td>
                        <td><?php echo $value->E; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </center> 
   
</body>
</html>
