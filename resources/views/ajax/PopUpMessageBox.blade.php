<style>
    #divPopUpCompleted {background-color: #140f0d;margin: auto; padding: 0px 10px 0px;width: 240px;overflow: hidden;height: 145px;font-size: 14px;}
    #divPopUpCompleted *{color: #FFFFFF}
    #divPopUpCompleted ul{list-style: none;margin-bottom: 50px;overflow: auto;}
    #divPopUpCompleted ul li {margin-top: 80px;margin-right: 25px;float: left;max-width: 400px;overflow: hidden}
    #divPopUpCompleted li img{max-width: 200px;}
    #divPopUpCompleted .sp-orange{color: #b49a66}
    #divPopUpCompleted p{margin-bottom: 5px;}
</style>

<div id="divPopUpCompleted" style="position: absolute; left: 600px; top: 306px;">
    <p style="margin-top: 15%;text-align: center" data-lang="save-completed">{{ $message }}</p>
    <br>
    <br>
    <br>
    <p style="text-align: center"><button class="btnstep closes" style="width: 150px;text-align: center" data-lang="ok">OK</button></p>
</div>