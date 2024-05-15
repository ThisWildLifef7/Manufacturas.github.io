// const boxImage = document.getElementsByClassName('phto1');
// const height = boxImage.clientHeight;
// const width = boxImage.clientWidth;

// boxImage.addEvenListener('mousemove', (evt) => {
//     const {layerX, layerY} = evt

//     const yRotation = ((layerX - width / 2) / width) * 20;
//     const xRotation = ((layerY - height / 2) / height) * 20;

//     const string = `
//         perspective(500px)
//         scale(1.1)
//         rotateX(${xRotation}deg)
//         rotateY(${yRotation}deg)`

//     boxImage.style.transform = string
// })

// boxImage.addEvenListener('mouseout', () => {
//     boxImage.style.transform = `
//         perspective(500px)
//         scale(1)
//         rotateX(0)
//         rotateY(0)`
// })