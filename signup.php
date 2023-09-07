<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link href="signin.css" rel="stylesheet">
    <style>
        body {background-color: rgba(0, 0, 0, 0.6);}
    </style>
    <title>회원가입</title>
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form method="post" action="check_sign.php">
            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Username" required>
            </div>    
        
            <div class="mb-3">
                <label for="passwd">Password</label>
                <input type="password" name="passwd" class="form-control" placeholder="Userpw" required><br><br>
            </div>
            <div class="mb-3">
            	<input type="text" class="form-control" id="postcode" placeholder="우편번호"><br>
		<input type="button" class="btn btn-light" onclick="execDaumPostcode()" value="우편번호 찾기"><br><br>
		<input type="text" class="form-control" id="address" placeholder="주소" name="address"><br>
		<input type="text" class="form-control" id="detailAddress" placeholder="상세주소" name="detailAddress">
            </div>
            <div class="d-grid gap-2 col-12 mx-auto">
                <button type="submit" class="btn btn-light" onclick="button()">
                Sigh Up!
             </div>
            </button>
        </form>
        
    </main>
    <script>
    function execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('postcode').value = data.zonecode;
                document.getElementById("address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("detailAddress").focus();
            }
        }).open();
    }
</script>
   
  <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.js"></script>
</body>
</html>
