<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url('<?php echo e(public_path('assets/images/certificate-template.png')); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
            margin: 0;
            background-color: rebeccapurple;
        }

        #lecturer-name {
            position: absolute;
            top: 38%;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 36px;
            color: #263581;
            font-weight: normal;
        }

        #course-title {
            position: absolute;
            top: 58.5%;
            left: 20%;
            right: 20%;
            text-align: center;
            font-size: 20px;
            color: #263581;
            font-weight: normal;
            text-transform: uppercase;
            line-height: 1.5;
        }

        #course-date {
            position: absolute;
            top: 69%;
            left: 49%;
            right: 20%;
            font-size: 24px;
            color: #263581;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="lecturer-name"><?php echo e($course->lecturer->name); ?></div>
<div id="course-title">Guru kandungan - <?php echo e($course->title); ?></div>
<div id="course-date"><?php echo e(Carbon::make($course->date)->isoFormat('D MMMM Y')); ?></div>
</body>
</html>

<?php /**PATH C:\Users\lunox\Documents\GuruKandungan\resources\views/pdf/certificate.blade.php ENDPATH**/ ?>