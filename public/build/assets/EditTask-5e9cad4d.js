import{M as f}from"./App-583bdf1e.js";import{T as k,o as m,c as h,a as t,b as i,v,k as T,w as b,F as y,r as l,h as M,f as $,n,j as p,e as w}from"./app-fd994637.js";import{_ as d}from"./_plugin-vue_export-helper-c27b6911.js";const E={props:{task:null},data(){return{form:k({title:this.task.title,priority:this.task.priority})}},methods:{updateTask(){this.form.post(`/tarefas/editar/${this.task.id}`)}}},x=t("h5",{class:"ms-4"},"Editar tarefa",-1),F={class:"mb-3 w-75 ms-3"},B=t("label",{class:"form-label",for:"title"},"Titulo",-1),V={class:"mb-3 w-75 ms-3"},g=t("label",{class:"form-label",for:"priority"},"Prioridade",-1),N=t("option",{selected:"",value:"3"},"Normal",-1),P=t("option",{value:"2"},"Importante",-1),S=t("option",{value:"1"},"Urgente",-1),U=[N,P,S],q=t("input",{type:"submit",value:"Salvar",class:"ms-3 btn btn-primary"},null,-1);function C(r,e,c,u,o,a){return m(),h(y,null,[x,t("form",{onSubmit:e[2]||(e[2]=b((...s)=>a.updateTask&&a.updateTask(...s),["prevent"])),class:"p-2 pb-3"},[t("div",F,[B,i(t("input",{"onUpdate:modelValue":e[0]||(e[0]=s=>o.form.title=s),required:"",type:"text",name:"title",id:"title",class:"form-control"},null,512),[[v,o.form.title]])]),t("div",V,[g,i(t("select",{"onUpdate:modelValue":e[1]||(e[1]=s=>o.form.priority=s),required:"",class:"form-select",name:"priority",id:"priority"},U,512),[[T,o.form.priority]])]),q],32)],64)}const j=d(E,[["render",C]]),z={components:{MainTemplate:f,EditTaskForm:j},props:{tasks:null,task:null,user:null}};function D(r,e,c,u,o,a){const s=l("EditTaskForm"),_=l("MainTemplate");return m(),M(_,n(p(r.$props)),{default:$(()=>[w(s,n(p(r.$props)),null,16)]),_:1},16)}const G=d(z,[["render",D]]);export{G as default};