import common from "./common";

class ListDataTableApp {
   constructor() {
   }

    onLoadPage(){ 
    //   alert('DataTable loaded');
      this.list();
      this.clickButton();

    }

    list(){
        let config = {
            url: "/datatable_app/list",
            columns: [
                { data: 'name',   width: 'auto', title: 'Name' },
                { data: 'email',   width: 'auto', title: 'Email' },
                // { data: 'answers',   width: 'auto', title: 'Answers' },
                { data: 'action',      width: 'auto', title: 'Action' }
                
            ],
            targets: [
                {targets: [0],  className: "text-right"}
            ]
        }

        common.createTableAjax('#answers_table', config.columns, config.url, config.targets)
    }

    clickButton(){
        var self = this;

        $('#answers_table').on('click', '.btn-view', function () {
            let id = $(this).data('id');
            common.showModal("#datatableModal")

           let record = $.ajax({
                url: '/datatable_app/answers',
                type: "POST",
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id
                },
                success: function (data) {
                    return data;
                },
            }).responseJSON;

            $('#modalName').text(record.name);
            $('#modalEmail').text(record.email);
            $('#modalAnswers').text(JSON.stringify(record.answers, null, 2));
            $('#modalDate').text(record.created_at);

            var parsedAnswers = JSON.parse(record.answers);
            var answersArray = Object.values(parsedAnswers);
            
            console.log(answersArray);
            self.highlightDISC(answersArray);

        });
    
    }

    highlightDISC(answersArray) {
  // ✅ Remove old highlights
  $('#discTable td').removeClass('highlight');
  $('#totalD, #totalI, #totalS, #totalC').text('').removeClass('highlight-total');

  // ✅ Get all data rows except the last 2 rows (total + labels)
    var rows = $('#discTable tbody tr').slice(0, 24);
    var totals = [0, 0, 0, 0];

    $.each(answersArray, function(idx, ans) {
      var row = rows.eq(idx);
      if (!row.length) return;
        console.log('Processing answer:', ans, 'for row:', idx + 1);
      var cells = row.find('td');
      cells.slice(1).each(function(i) {
        if ($(this).text().trim().toUpperCase() === ans.toUpperCase()) {
          $(this).addClass('highlight');
          totals[i]++;
        }
      });
    });

    // ✅ Update totals
    $('#totalD').text(totals[0]);
    $('#totalI').text(totals[1]);
    $('#totalS').text(totals[2]);
    $('#totalC').text(totals[3]);

    // ✅ Highlight top 2 totals
    var sorted = $.map(totals, function(val, idx) {
      return { val: val, idx: idx };
    }).sort(function(a, b) {
      return b.val - a.val;
    }).slice(0, 2);

    $.each(sorted, function(_, obj) {
      var id = ['#totalD', '#totalI', '#totalS', '#totalC'][obj.idx];
      $(id).addClass('highlight-total');
    });
}
    
}
export default new ListDataTableApp();