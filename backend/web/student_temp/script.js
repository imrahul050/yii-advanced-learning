 // Sample data – replace with your backend / template loop
//   let students = [
//     {id:1,first:'Aarav',last:'Sharma',email:'aarav@example.com',phone:'+91 98100 11122',roll:'STU-1001',course:'Computer Science',status:'Active',dob:'2004-03-14',gender:'gM',address:'Meerut, Uttar Pradesh'},
//     {id:2,first:'Priya',last:'Verma',email:'priya@example.com',phone:'+91 98110 22233',roll:'STU-1002',course:'Design',status:'Active',dob:'2003-11-02',gender:'gF',address:'Lucknow, Uttar Pradesh'},
//     {id:3,first:'Rohan',last:'Gupta',email:'rohan@example.com',phone:'+91 98120 33344',roll:'STU-1003',course:'Mechanical',status:'Pending',dob:'2004-07-21',gender:'gM',address:'Delhi'},
//     {id:4,first:'Sneha',last:'Iyer',email:'sneha@example.com',phone:'+91 98130 44455',roll:'STU-1004',course:'Biotech',status:'Active',dob:'2003-01-30',gender:'gF',address:'Pune, Maharashtra'},
//     {id:5,first:'Kabir',last:'Singh',email:'kabir@example.com',phone:'+91 98140 55566',roll:'STU-1005',course:'Business Admin',status:'Inactive',dob:'2002-09-09',gender:'gM',address:'Jaipur, Rajasthan'},
//     {id:6,first:'Ananya',last:'Das',email:'ananya@example.com',phone:'+91 98150 66677',roll:'STU-1006',course:'Computer Science',status:'Pending',dob:'2004-05-18',gender:'gF',address:'Kolkata, West Bengal'}
//   ];
//   const colors=['#0f8b7d','#3b5bdb','#c2410c','#7c3aed','#be185d','#0369a1'];
//   const $=id=>document.getElementById(id);
//   let editingId=null, deleteId=null;
//   const delModal=new bootstrap.Modal($('delModal'));

//   function render(){
//     const q=$('search').value.toLowerCase(), c=$('filterCourse').value, s=$('filterStatus').value;
//     const list=students.filter(x=>(`${x.first} ${x.last} ${x.email} ${x.roll}`).toLowerCase().includes(q)&&(!c||x.course===c)&&(!s||x.status===s));
//     $('rows').innerHTML=list.map(x=>`
//       <tr>
//         <td class="cell-student"><div class="d-flex align-items-center gap-3">
//           <div class="avatar" style="background:${colors[x.id%colors.length]}">${x.first[0]}${x.last[0]}</div>
//           <div><div class="name">${x.first} ${x.last}</div><div class="sub">${x.email}</div></div></div></td>
//         <td data-label="Roll no.">${x.roll}</td><td data-label="Course">${x.course}</td><td data-label="Phone">${x.phone}</td>
//         <td data-label="Status"><span class="pill pill-${x.status.toLowerCase()}">${x.status}</span></td>
//         <td class="text-end text-nowrap cell-actions">
//           <a href="#edit/${x.id}" class="icon-btn" title="Edit ${x.first}"><i class="bi bi-pencil"></i></a>
//           <button class="icon-btn danger" title="Delete ${x.first}" onclick="askDelete(${x.id})"><i class="bi bi-trash"></i></button>
//         </td></tr>`).join('');
//     $('empty').classList.toggle('d-none',list.length>0);
//     $('count').textContent=`Showing ${list.length} of ${students.length} students`;
//     $('stTotal').textContent=students.length;
//     $('stActive').textContent=students.filter(x=>x.status==='Active').length;
//     $('stPending').textContent=students.filter(x=>x.status==='Pending').length;
//   }
//   ['search','filterCourse','filterStatus'].forEach(id=>$(id).addEventListener('input',render));

  function askDelete(id){deleteId=id;const s=students.find(x=>x.id===id);$('delName').textContent=`${s.first} ${s.last}`;delModal.show()}
  $('delConfirm').onclick=()=>{students=students.filter(x=>x.id!==deleteId);delModal.hide();render()};

  // Simple hash router: #list, #create, #edit/ID
  const fields=['first','last','dob','email','phone','address','roll','course','status'];
  function route(){
    const h=location.hash||'#list';
    document.querySelectorAll('.view').forEach(v=>v.classList.remove('show'));
    const form=$('studentForm'); form.classList.remove('was-validated');
    let nav='list';
    if(h==='#create'||h.startsWith('#edit/')){
      $('view-form').classList.add('show'); nav='create';
      const edit=h.startsWith('#edit/'); editingId=edit?+h.split('/')[1]:null;
      const s=edit?students.find(x=>x.id===editingId):null;
      form.reset();
      if(s){fields.forEach(f=>$(f).value=s[f]);$(s.gender).checked=true}
      $('formTitle').textContent=edit?'Update student':'Create student';
      $('crumb').textContent=edit?'Update student':'Create student';
      $('formSub').textContent=edit?`Editing ${s?.first||''} ${s?.last||''}. Changes apply as soon as you save.`:'Fill in the details below to add a new student.';
      $('saveBtn').textContent=edit?'Save changes':'Save student';
      if(edit) nav='';
    } else { $('view-list').classList.add('show'); render(); }
    document.querySelectorAll('[data-nav]').forEach(a=>a.classList.toggle('active',a.dataset.nav===nav));
    window.scrollTo(0,0);
  }
  window.addEventListener('hashchange',()=>{
    const m=$('mainMenu'); if(m.classList.contains('show')) bootstrap.Collapse.getOrCreateInstance(m).hide();
    route();
  });
  route();

  $('studentForm').addEventListener('submit',e=>{
    e.preventDefault();
    const f=e.target; f.classList.add('was-validated');
    if(!f.checkValidity()) return;
    const data={}; fields.forEach(k=>data[k]=$(k).value);
    data.gender=['gM','gF','gO'].find(g=>$(g).checked);
    if(editingId) students=students.map(x=>x.id===editingId?{...x,...data}:x);
    else students.push({id:Date.now()%100000,...data});
    location.hash='#list';
  });