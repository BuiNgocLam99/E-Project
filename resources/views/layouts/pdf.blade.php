<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    {{-- <link rel="stylesheet" href="{{ asset('styles/pageStyle/pdf.css') }}"> --}}
</head>
<style>



.container{
    width: 90%;
    height: 100%;
    margin: 0 auto;
    /* overflow: hidden; */
}

.container__header{
    width: 100%;
    margin-top: 50px;
}

.container__header div:nth-child(1){
    font-size: 35px;
}
.container__header div:nth-child(2){
    font-size: 18px;
    margin-left: 40px;
}

.container__content{
    width: 100%;
    margin-top: 60px;
}

.container__content-title{
    width: 100%;
    font-size: 30px;
    font-weight: bold;
    text-align: center;
}

.container__content-details{
    width: 100%;
    margin-top: 40px;
}

.container__content-details-img{
    width: 30%;
    height: 300px;
    float: left;
    background-color: rgb(218, 213, 213);
}

.container__content-details-info{
    width: 70%;
    float: left;
}

table{
    margin-left: 20px;
    text-align: left;
    font-size: 18px;
}

table tr th{
    width: 150px;
    height: 25px;

}

table tr th td{
    width: 150px;
    /* overflow-y: auto; */
}

</style>
<body>
    <form action="">
        <div class="container">
            <div class="container__header">
                <div>PURSELLET</div>
                <div>Pursellet.com</div>
            </div>
            <div class="container__content">
                <div class="container__content-title">Product Details</div>
                <div class="container__content-details">
                    <div class="container__content-details-img" style="background-image: url(); background-size:cover;">

                    </div>
                    <div class="container__content-details-info">
                        <table>
                            <tr>
                                <th>Product:</th>
                                <td>ABCXYZ</td>
                            </tr>
                            <tr>
                                <th>Product Code:</th>
                                <td>A123123</td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td>$69696969</td>
                            </tr>
                            <tr>
                                <th>Brand:</th>
                                <td>haidz</td>
                            </tr>
                            <tr>
                                <th>Material:</th>
                                <td>Titanium</td>
                            </tr>
                            <tr>
                                <th>Size:</th>
                                <td>69x69</td>
                            </tr>
                            <tr>
                                <th>Information:</th>
                                <td>aaaaaaaaaaaa aaaaaaaaaa</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
