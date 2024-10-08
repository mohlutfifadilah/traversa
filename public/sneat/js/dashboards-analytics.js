/**
 * Dashboard Analytics
 */

'use strict';

(function () {
	let cardColor, headingColor, axisColor, shadeColor, borderColor;

	cardColor = config.colors.white;
	headingColor = config.colors.headingColor;
	axisColor = config.colors.axisColor;
	borderColor = config.colors.borderColor;

	// Growth Chart - Radial Bar Chart
	// --------------------------------------------------------------------
	const growthChartEl = document.querySelector("#growthChart"),
		growthChartOptions = {
			series: [78],
			labels: ["Growth"],
			chart: {
				height: 240,
				type: "radialBar",
			},
			plotOptions: {
				radialBar: {
					size: 150,
					offsetY: 10,
					startAngle: -150,
					endAngle: 150,
					hollow: {
						size: "55%",
					},
					track: {
						background: cardColor,
						strokeWidth: "100%",
					},
					dataLabels: {
						name: {
							offsetY: 15,
							color: headingColor,
							fontSize: "15px",
							fontWeight: "600",
							fontFamily: "Public Sans",
						},
						value: {
							offsetY: -25,
							color: headingColor,
							fontSize: "22px",
							fontWeight: "500",
							fontFamily: "Public Sans",
						},
					},
				},
			},
			colors: [config.colors.primary],
			fill: {
				type: "gradient",
				gradient: {
					shade: "dark",
					shadeIntensity: 0.5,
					gradientToColors: [config.colors.primary],
					inverseColors: true,
					opacityFrom: 1,
					opacityTo: 0.6,
					stops: [30, 70, 100],
				},
			},
			stroke: {
				dashArray: 5,
			},
			grid: {
				padding: {
					top: -35,
					bottom: -10,
				},
			},
			states: {
				hover: {
					filter: {
						type: "none",
					},
				},
				active: {
					filter: {
						type: "none",
					},
				},
			},
		};
	if (typeof growthChartEl !== undefined && growthChartEl !== null) {
		const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
		growthChart.render();
	}

	// Konfigurasi chart
	const profileReportChartEl = document.querySelector("#profileReportChart"),
		profileReportChartConfig = {
			chart: {
				height: 80,
				type: "line",
				toolbar: {
					show: false,
				},
				dropShadow: {
					enabled: true,
					top: 10,
					left: 5,
					blur: 3,
					color: "#ffab00", // Sesuaikan warna grafik
					opacity: 0.15,
				},
				sparkline: {
					enabled: true,
				},
			},
			grid: {
				show: false,
				padding: {
					right: 8,
				},
			},
			colors: ["#ffab00"], // Warna grafik
			dataLabels: {
				enabled: false,
			},
			stroke: {
				width: 5,
				curve: "smooth",
			},
			series: [
				{
					name: "Tarif",
					data: Object.values(tarifPerBulan), // Data dari PHP (Laravel)
				},
			],
			xaxis: {
				categories: [
					"Jan",
					"Feb",
					"Mar",
					"Apr",
					"Mei",
					"Jun",
					"Jul",
					"Agu",
					"Sep",
					"Okt",
					"Nov",
					"Des",
				],
				show: true,
				lines: {
					show: false,
				},
				labels: {
					show: true,
				},
				axisBorder: {
					show: true,
				},
			},
			yaxis: {
				show: true,
			},
		};

	// Render chart
	if (
		typeof profileReportChartEl !== undefined &&
		profileReportChartEl !== null
	) {
		const profileReportChart = new ApexCharts(
			profileReportChartEl,
			profileReportChartConfig
		);
		profileReportChart.render();
	}

	// Fungsi untuk menghasilkan warna acak
	function getRandomColor() {
		var letters = "0123456789ABCDEF";
		var color = "#";
		for (var i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
	}

	// Fungsi untuk menghasilkan array warna acak
	function generateColors(length) {
		var colors = [];
		for (var i = 0; i < length; i++) {
			colors.push(getRandomColor());
		}
		return colors;
	}

	// Generate warna sebanyak data armada
	var colors = generateColors(labelsLength1);

	// Order Statistics Chart
	// --------------------------------------------------------------------
	const chartOrderStatistics = document.querySelector("#orderStatisticsChart"),
		totalSum = totals1.reduce((a, b) => a + b, 0), // Menghitung total
		orderChartConfig = {
			chart: {
				height: 165,
				width: 130,
				type: "donut",
			},
			labels: labels1,
			series: totals1,
			colors: colors,
			stroke: {
				width: 5,
				colors: cardColor,
			},
			dataLabels: {
				enabled: false,
				formatter: function (val, opt) {
					// Menghitung persentase untuk data labels
					var percentage = ((val / totalSum) * 100).toFixed(2); // Membulatkan persentase hingga dua desimal
					return percentage + "%"; // Menampilkan persentase
				},
			},
			legend: {
				show: false,
			},
			grid: {
				padding: {
					top: 0,
					bottom: 0,
					right: 15,
				},
			},
			plotOptions: {
				pie: {
					donut: {
						size: "75%",
						labels: {
							show: true,
							value: {
								fontSize: "1.5rem",
								fontFamily: "Public Sans",
								color: headingColor,
								offsetY: -15,
								formatter: function (val) {
									var percentage = (val / totalSum) * 100; // Membulatkan persentase hingga dua desimal
									return percentage + "%"; // Menampilkan persentase
								},
							},
							name: {
								offsetY: 20,
								fontFamily: "Public Sans",
							},
							total: {
								show: true,
								fontSize: "0.8125rem",
								color: axisColor,
								label: "Total",
								formatter: function (w) {
									return "100%"; // Menampilkan total persentase 100%
								},
							},
						},
					},
				},
			},
		};

	if (
		typeof chartOrderStatistics !== undefined &&
		chartOrderStatistics !== null
	) {
		const statisticsChart = new ApexCharts(
			chartOrderStatistics,
			orderChartConfig
		);
		statisticsChart.render();
	}

	// Income Chart - Area chart
	// --------------------------------------------------------------------
	const incomeChartEl = document.querySelector("#incomeChart"),
		incomeChartConfig = {
			series: [
				{
					data: [24, 21, 30, 22, 42, 26, 35, 29],
				},
			],
			chart: {
				height: 215,
				parentHeightOffset: 0,
				parentWidthOffset: 0,
				toolbar: {
					show: false,
				},
				type: "area",
			},
			dataLabels: {
				enabled: false,
			},
			stroke: {
				width: 2,
				curve: "smooth",
			},
			legend: {
				show: false,
			},
			markers: {
				size: 6,
				colors: "transparent",
				strokeColors: "transparent",
				strokeWidth: 4,
				discrete: [
					{
						fillColor: config.colors.white,
						seriesIndex: 0,
						dataPointIndex: 7,
						strokeColor: config.colors.primary,
						strokeWidth: 2,
						size: 6,
						radius: 8,
					},
				],
				hover: {
					size: 7,
				},
			},
			colors: [config.colors.primary],
			fill: {
				type: "gradient",
				gradient: {
					shade: shadeColor,
					shadeIntensity: 0.6,
					opacityFrom: 0.5,
					opacityTo: 0.25,
					stops: [0, 95, 100],
				},
			},
			grid: {
				borderColor: borderColor,
				strokeDashArray: 3,
				padding: {
					top: -20,
					bottom: -8,
					left: -10,
					right: 8,
				},
			},
			xaxis: {
				categories: ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
				axisBorder: {
					show: false,
				},
				axisTicks: {
					show: false,
				},
				labels: {
					show: true,
					style: {
						fontSize: "13px",
						colors: axisColor,
					},
				},
			},
			yaxis: {
				labels: {
					show: false,
				},
				min: 10,
				max: 50,
				tickAmount: 4,
			},
		};
	if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
		const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
		incomeChart.render();
	}

	// Expenses Mini Chart - Radial Chart
	// --------------------------------------------------------------------
	const weeklyExpensesEl = document.querySelector("#expensesOfWeek"),
		weeklyExpensesConfig = {
			series: [65],
			chart: {
				width: 60,
				height: 60,
				type: "radialBar",
			},
			plotOptions: {
				radialBar: {
					startAngle: 0,
					endAngle: 360,
					strokeWidth: "8",
					hollow: {
						margin: 2,
						size: "45%",
					},
					track: {
						strokeWidth: "50%",
						background: borderColor,
					},
					dataLabels: {
						show: true,
						name: {
							show: false,
						},
						value: {
							formatter: function (val) {
								return "$" + parseInt(val);
							},
							offsetY: 5,
							color: "#697a8d",
							fontSize: "13px",
							show: true,
						},
					},
				},
			},
			fill: {
				type: "solid",
				colors: config.colors.primary,
			},
			stroke: {
				lineCap: "round",
			},
			grid: {
				padding: {
					top: -10,
					bottom: -15,
					left: -10,
					right: -10,
				},
			},
			states: {
				hover: {
					filter: {
						type: "none",
					},
				},
				active: {
					filter: {
						type: "none",
					},
				},
			},
		};
	if (typeof weeklyExpensesEl !== undefined && weeklyExpensesEl !== null) {
		const weeklyExpenses = new ApexCharts(
			weeklyExpensesEl,
			weeklyExpensesConfig
		);
		weeklyExpenses.render();
	}
})();
