function computeCost() {
  var originalqty = document.getElementById("originalqty").value;
  var porkqty = document.getElementById("porkqty").value;
  var prawnqty = document.getElementById("prawnqty").value;
  var tomyamqty = document.getElementById("tomyamqty").value;

// Compute the cost

  document.getElementById("cost").value = 
  totalCost = originalqty * 4.00 + porkqty * 4.00 + prawnqty * 4.00 + tomyamqty * 4.00;
  
  
  document.getElementById("original").value = 
  totalCost = originalqty * 4.00;
  
  document.getElementById("pork").value = 
  totalCost = porkqty * 4.00;
  
  document.getElementById("prawn").value = 
  totalCost = prawnqty * 4.00;
  
  document.getElementById("tomyam").value = 
  totalCost = tomyamqty * 4.00;
  }
