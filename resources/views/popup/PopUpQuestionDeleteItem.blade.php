<style>
    #divQuestionDeleteItem {
        background-color: #140f0d;
        border: solid 2px rgba(255, 255, 255, 0.1);
        margin: auto;
        padding: 0px 10px 0px;
        width: 410px;
        overflow: hidden;
        height: 130px;
        font-size: 14px;
    }

    #divQuestionDeleteItem * {
        color: #FFFFFF
    }

    #divQuestionDeleteItem ul {
        list-style: none;
        margin-bottom: 50px;
        overflow: auto;
    }

    #divQuestionDeleteItem ul li {
        margin-top: 80px;
        margin-right: 25px;
        float: left;
        max-width: 400px;
        overflow: hidden
    }

    #divQuestionDeleteItem li img {
        max-width: 200px;
    }

    #divQuestionDeleteItem .sp-orange {
        color: #b49a66
    }

    #divQuestionDeleteItem p {
        margin-bottom: 5px;
    }
</style>
<div id="divQuestionDeleteItem">
    <p style="margin-top: 5%;text-align: center" data-lang="do-you-want-remove-item">Do you want to remove Item Shoe ?
    </p>
    <br>
    <br>
    <p style="text-align: center">
        <button class="btnstep" id="btnRemoveItemProductYes" style="width: 130px;text-align: center;margin: 0 2px" data-lang="yes">Yes</button>
        <button class="btnstep closes" style="width: 130px;text-align: center;margin: 0 2px" data-lang="no">No</button>
    </p>
</div>