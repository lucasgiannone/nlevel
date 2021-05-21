const canvas = document.getElementById('canvas')
const ctx = canvas.getContext('2d')
const nameInput = document.getElementById('name')
const dataInput = document.getElementById('data')
const palestraInput = document.getElementById('palestra')
const downloadBtn = document.getElementById('download-btn')

const image = new Image()
image.src = '../../images/certificadoathon.jpg'
image.onload = function () {
	drawImageName()
}


//inicio funcao
function drawImageName() {
	// ctx.clearRect(0, 0, canvas.width, canvas.height)
	ctx.drawImage(image, 0, 0, canvas.width, canvas.height)
	ctx.font = '40px monotype corsiva'
	ctx.fillStyle = '#a'
	ctx.fillText(nameInput.value, 10, 180)
	
}
function drawImageData(){
	ctx.font = '20px monotype corsiva'
	ctx.fillStyle = '#a'
	ctx.fillText(dataInput.value, 350, 280)
}
function drawImagePalestra(){
	ctx.font = '25px monotype corsiva'
	ctx.fillStyle = '#a'
	ctx.fillText(palestraInput.value, 30, 210)
}
//fim funcoes

// inicio eventos de input
nameInput.addEventListener('input', function () {
	drawImageName()
	drawImageData()
	drawImagePalestra()
})
dataInput.addEventListener('input', function (){
	drawImageName()
	drawImageData()
	drawImagePalestra()
})
palestraInput.addEventListener('input', function(){
	drawImageName()
	drawImageData()
	drawImagePalestra()
})
// fim eventos


downloadBtn.addEventListener('click', function () {
	downloadBtn.href = canvas.toDataURL('image/jpg')
	downloadBtn.download = 'Certificate - ' + nameInput.value
})
