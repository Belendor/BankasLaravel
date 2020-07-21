const firstInput = document.querySelector("#change-first")
const secondInput = document.querySelector("#change-second")

const firstSelect = document.querySelector("#select1")
const secondSelect = document.querySelector("#select2")


const USDtoEURRate = Number(document.querySelector("#USDtoEUR").innerHTML)
const EURtoUSDRate = Number(document.querySelector("#EURtoUSD").innerHTML)

let firstSelected = '';
let secondSelected = '';

firstSelect.addEventListener("change", ()=>{
    firstSelected = firstSelect.value
    secondSelected = secondSelect.value

    if(firstSelected == 'eur' && secondSelected == 'usd'){

        secondInput.value = firstInput.value * EURtoUSDRate

    }else if(firstSelected == 'usd' && secondSelected == 'eur'){

        secondInput.value = firstInput.value * USDtoEURRate

    }else{
        secondInput.value = firstInput.value
    }
})

secondSelect.addEventListener("change", ()=>{
    firstSelected = firstSelect.value
    secondSelected = secondSelect.value

    if(firstSelected == 'eur' && secondSelected == 'usd'){

        secondInput.value = firstInput.value * EURtoUSDRate

    }else if(firstSelected == 'usd' && secondSelected == 'eur'){

        secondInput.value = firstInput.value * USDtoEURRate

    }else{
        secondInput.value = firstInput.value
    }
})

firstInput.addEventListener("input", ()=>{
    
    firstSelected = firstSelect.value
    secondSelected = secondSelect.value

    if(firstSelected == 'eur' && secondSelected == 'usd'){

        secondInput.value = firstInput.value * EURtoUSDRate

    }else if(firstSelected == 'usd' && secondSelected == 'eur'){

        secondInput.value = firstInput.value * USDtoEURRate

    }else{
        secondInput.value = firstInput.value
    }

})