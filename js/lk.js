document.addEventListener("DOMContentLoaded",function () {
    $('.object button.topBtn').click(function () {
        let objectId=$(this).attr('objectId');
        $.post( "ajax/topobject.php", { objectId: objectId } );
        alert('Вы подняли объявление');
    })
	 $('.object button.tobaner').click(function () {
        let objectId=$(this).attr('objectId');
		console.log(objectId);
        $.post( "ajax/baner.php", { objectId: objectId } );
        alert('Вы доабили объявление в банер'+objectId);
    })
})