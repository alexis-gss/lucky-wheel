var colors = [];
var percent = [];

for (let i = 0; i < target.length; i++) {
    colors.push("#" + Math.floor(Math.random() * 2 ** 24).toString(16).padStart(6, 0));
    percent.push(1);
}

// Create the canvas with the chart.
const ctx = document.getElementById('wheelChart').getContext('2d');
const chartOptions = {
    events: [],
    plugins: {
        legend: {
            display: false
        },
        labels: {
            render: (args) => {
                return (args.percentage > 10) ? `${args.label}`: `${args.label.slice(0, 3)}`;
            },
            arc: true,
            position: 'border',
            fontSize: 20,
            fontColor: function (data) {
                var rgb = hexToRgb(data.dataset.backgroundColor[data.index]);
                var threshold = 140;
                var luminance = 0.299 * rgb.r + 0.587 * rgb.g + 0.114 * rgb.b;
                return luminance > threshold ? 'black' : 'white';
            },
        },
        tooltip: false
    },
    elements: {
        arc: {
            borderWidth: 0
        }
    }
};
const chartData = {
    labels: target,
    datasets: [{
        data: percent,
        backgroundColor: colors,
        hoverOffset: 5
    }],
};
const myChart = new Chart(ctx, {
    type: 'pie',
    data: chartData,
    options: chartOptions
});

// Get rgb color.
function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

// Set the legend.
var text = [];
var legendNode = document.querySelector(".legend");
var listGroup = legendNode.querySelector(".list-group");
var ds = myChart.data.datasets[0];
ds.data.forEach((element, index) => {
    const button = document.createElement("button");
    button.className = "list-group-item list-group-item-action";
    button.innerHTML
    listGroup.appendChild(button);

    const span = document.createElement("span");
    span.setAttribute("style", "background-color:" + ds.backgroundColor[index] + "");
    button.appendChild(span);
    button.innerHTML += myChart.data.labels[index];
});
const para = document.createElement("p");
para.className = "text-body-secondary fst-italic m-0";
para.innerHTML = "Each value has a ";
const span = document.createElement("span");
span.setAttribute("id", "legend-values-percent");
para.appendChild(span);
para.innerHTML += "% chance of being selected in the wheel.";
legendNode.appendChild(para);
var legendItems = listGroup.querySelectorAll('.list-group-item');
listGroup.querySelectorAll('.list-group-item').forEach(element => {
    element.addEventListener("click", legendClickCallback, false);
});
setValuesPercent();

// Hide the part of the chart referring to the element in the legend.
function legendClickCallback(event) {
    var target = event.target || event.srcElement;
    var parent = target.parentElement;
    var index = Array.prototype.slice.call(parent.children).indexOf(target);
    var meta = myChart.getDatasetMeta(0);
    var item = meta.data[index];
    (item.hidden === true) ? target.classList.remove('legend-hidden') : target.classList.add('legend-hidden');
    item.hidden = (item.hidden === true) ? null : true;
    setValuesPercent();
    myChart.update();
}

// Update the percent of each values to being selected by the wheel.
function setValuesPercent() {
    let countVisibleValues = document.querySelectorAll(".legend .list-group .list-group-item:not(.legend-hidden)").length;
    document.getElementById("legend-values-percent").innerHTML = countVisibleValues
        ? Math.round(((100 / countVisibleValues) + Number.EPSILON) * 100) / 100
        : 0;
}

var rotation = 0;
// Rotate all the canvas to simulate a real rotating wheel.
document.querySelector(".wheel-button").addEventListener("click", function () {
    getRandomRotation();
    document.querySelector(".wheel-circle").style.transform = "rotate(" + (rotation) + "deg)";
})

// Get random rotation degree.
function getRandomRotation() {
    let tmp = Math.random() * 5000 + 5000;
    if ((rotation + 1000) < tmp || (rotation - 1000) > tmp)
        rotation = tmp;
    else
        getRandomRotation()
}