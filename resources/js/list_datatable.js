import common from "./common";

class ListDataTable {
   constructor() {
   }

    onLoadPage(){
    //   alert('DataTable loaded');
      this.list();

    }

    list(){
        let config = {
            url: "/datatable/list",
            columns: [
                { data: 'emp_code',   width: 'auto', title: 'Employee Code' },
                { data: 'emp_name',   width: 'auto', title: 'Employee Name' },
                { data: 'department',   width: 'auto', title: 'Department/Section' },
                { data: 'action',      width: 'auto', title: 'Action' }
                
            ],
            targets: [
                {targets: [0],  className: "text-right"}
            ]
        }

        common.createTableAjax('#answer_table', config.columns, config.url, config.targets)
    }   
    
}
export default new ListDataTable();