var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// equipos table
equipos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Equipos' table. A member who adds a record to the table becomes the 'owner' of that record."];

equipos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Equipos' table."];
equipos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Equipos' table."];
equipos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Equipos' table."];
equipos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Equipos' table."];

equipos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Equipos' table."];
equipos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Equipos' table."];
equipos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Equipos' table."];
equipos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Equipos' table, regardless of their owner."];

equipos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Equipos' table."];
equipos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Equipos' table."];
equipos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Equipos' table."];
equipos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Equipos' table."];

// modelos table
modelos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Modelos' table. A member who adds a record to the table becomes the 'owner' of that record."];

modelos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Modelos' table."];
modelos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Modelos' table."];
modelos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Modelos' table."];
modelos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Modelos' table."];

modelos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Modelos' table."];
modelos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Modelos' table."];
modelos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Modelos' table."];
modelos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Modelos' table, regardless of their owner."];

modelos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Modelos' table."];
modelos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Modelos' table."];
modelos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Modelos' table."];
modelos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Modelos' table."];

// familias table
familias_addTip=["",spacer+"This option allows all members of the group to add records to the 'Familias' table. A member who adds a record to the table becomes the 'owner' of that record."];

familias_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Familias' table."];
familias_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Familias' table."];
familias_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Familias' table."];
familias_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Familias' table."];

familias_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Familias' table."];
familias_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Familias' table."];
familias_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Familias' table."];
familias_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Familias' table, regardless of their owner."];

familias_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Familias' table."];
familias_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Familias' table."];
familias_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Familias' table."];
familias_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Familias' table."];

// repuestos table
repuestos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Repuestos' table. A member who adds a record to the table becomes the 'owner' of that record."];

repuestos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Repuestos' table."];
repuestos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Repuestos' table."];
repuestos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Repuestos' table."];
repuestos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Repuestos' table."];

repuestos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Repuestos' table."];
repuestos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Repuestos' table."];
repuestos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Repuestos' table."];
repuestos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Repuestos' table, regardless of their owner."];

repuestos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Repuestos' table."];
repuestos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Repuestos' table."];
repuestos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Repuestos' table."];
repuestos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Repuestos' table."];

// articulos table
articulos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Articulos' table. A member who adds a record to the table becomes the 'owner' of that record."];

articulos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Articulos' table."];
articulos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Articulos' table."];
articulos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Articulos' table."];
articulos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Articulos' table."];

articulos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Articulos' table."];
articulos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Articulos' table."];
articulos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Articulos' table."];
articulos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Articulos' table, regardless of their owner."];

articulos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Articulos' table."];
articulos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Articulos' table."];
articulos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Articulos' table."];
articulos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Articulos' table."];

// marcas table
marcas_addTip=["",spacer+"This option allows all members of the group to add records to the 'Marcas' table. A member who adds a record to the table becomes the 'owner' of that record."];

marcas_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Marcas' table."];
marcas_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Marcas' table."];
marcas_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Marcas' table."];
marcas_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Marcas' table."];

marcas_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Marcas' table."];
marcas_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Marcas' table."];
marcas_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Marcas' table."];
marcas_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Marcas' table, regardless of their owner."];

marcas_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Marcas' table."];
marcas_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Marcas' table."];
marcas_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Marcas' table."];
marcas_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Marcas' table."];

// equipo_repuestos table
equipo_repuestos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Equipo repuestos' table. A member who adds a record to the table becomes the 'owner' of that record."];

equipo_repuestos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Equipo repuestos' table."];
equipo_repuestos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Equipo repuestos' table."];
equipo_repuestos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Equipo repuestos' table."];
equipo_repuestos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Equipo repuestos' table."];

equipo_repuestos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Equipo repuestos' table."];
equipo_repuestos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Equipo repuestos' table."];
equipo_repuestos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Equipo repuestos' table."];
equipo_repuestos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Equipo repuestos' table, regardless of their owner."];

equipo_repuestos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Equipo repuestos' table."];
equipo_repuestos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Equipo repuestos' table."];
equipo_repuestos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Equipo repuestos' table."];
equipo_repuestos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Equipo repuestos' table."];

// tecnicos table
tecnicos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tecnicos' table. A member who adds a record to the table becomes the 'owner' of that record."];

tecnicos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tecnicos' table."];
tecnicos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tecnicos' table."];
tecnicos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tecnicos' table."];
tecnicos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tecnicos' table."];

tecnicos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tecnicos' table."];
tecnicos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tecnicos' table."];
tecnicos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tecnicos' table."];
tecnicos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tecnicos' table, regardless of their owner."];

tecnicos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tecnicos' table."];
tecnicos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tecnicos' table."];
tecnicos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tecnicos' table."];
tecnicos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tecnicos' table."];

// planificaciones table
planificaciones_addTip=["",spacer+"This option allows all members of the group to add records to the 'Planificaciones' table. A member who adds a record to the table becomes the 'owner' of that record."];

planificaciones_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Planificaciones' table."];
planificaciones_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Planificaciones' table."];
planificaciones_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Planificaciones' table."];
planificaciones_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Planificaciones' table."];

planificaciones_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Planificaciones' table."];
planificaciones_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Planificaciones' table."];
planificaciones_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Planificaciones' table."];
planificaciones_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Planificaciones' table, regardless of their owner."];

planificaciones_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Planificaciones' table."];
planificaciones_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Planificaciones' table."];
planificaciones_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Planificaciones' table."];
planificaciones_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Planificaciones' table."];

// planificacion_equipos table
planificacion_equipos_addTip=["",spacer+"This option allows all members of the group to add records to the 'Planificacion equipos' table. A member who adds a record to the table becomes the 'owner' of that record."];

planificacion_equipos_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Planificacion equipos' table."];
planificacion_equipos_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Planificacion equipos' table."];
planificacion_equipos_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Planificacion equipos' table."];
planificacion_equipos_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Planificacion equipos' table."];

planificacion_equipos_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Planificacion equipos' table."];
planificacion_equipos_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Planificacion equipos' table."];
planificacion_equipos_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Planificacion equipos' table."];
planificacion_equipos_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Planificacion equipos' table, regardless of their owner."];

planificacion_equipos_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Planificacion equipos' table."];
planificacion_equipos_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Planificacion equipos' table."];
planificacion_equipos_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Planificacion equipos' table."];
planificacion_equipos_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Planificacion equipos' table."];

// codigo_servicios table
codigo_servicios_addTip=["",spacer+"This option allows all members of the group to add records to the 'Codigo servicios' table. A member who adds a record to the table becomes the 'owner' of that record."];

codigo_servicios_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Codigo servicios' table."];
codigo_servicios_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Codigo servicios' table."];
codigo_servicios_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Codigo servicios' table."];
codigo_servicios_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Codigo servicios' table."];

codigo_servicios_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Codigo servicios' table."];
codigo_servicios_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Codigo servicios' table."];
codigo_servicios_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Codigo servicios' table."];
codigo_servicios_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Codigo servicios' table, regardless of their owner."];

codigo_servicios_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Codigo servicios' table."];
codigo_servicios_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Codigo servicios' table."];
codigo_servicios_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Codigo servicios' table."];
codigo_servicios_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Codigo servicios' table."];

// camionetas table
camionetas_addTip=["",spacer+"This option allows all members of the group to add records to the 'Camionetas' table. A member who adds a record to the table becomes the 'owner' of that record."];

camionetas_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Camionetas' table."];
camionetas_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Camionetas' table."];
camionetas_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Camionetas' table."];
camionetas_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Camionetas' table."];

camionetas_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Camionetas' table."];
camionetas_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Camionetas' table."];
camionetas_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Camionetas' table."];
camionetas_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Camionetas' table, regardless of their owner."];

camionetas_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Camionetas' table."];
camionetas_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Camionetas' table."];
camionetas_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Camionetas' table."];
camionetas_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Camionetas' table."];

// clientes table
clientes_addTip=["",spacer+"This option allows all members of the group to add records to the 'Clientes' table. A member who adds a record to the table becomes the 'owner' of that record."];

clientes_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Clientes' table."];
clientes_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Clientes' table."];
clientes_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Clientes' table."];
clientes_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Clientes' table."];

clientes_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Clientes' table."];
clientes_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Clientes' table."];
clientes_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Clientes' table."];
clientes_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Clientes' table, regardless of their owner."];

clientes_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Clientes' table."];
clientes_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Clientes' table."];
clientes_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Clientes' table."];
clientes_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Clientes' table."];

// planificacion_pendientes table
planificacion_pendientes_addTip=["",spacer+"This option allows all members of the group to add records to the 'Planificacion pendientes' table. A member who adds a record to the table becomes the 'owner' of that record."];

planificacion_pendientes_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Planificacion pendientes' table."];
planificacion_pendientes_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Planificacion pendientes' table."];
planificacion_pendientes_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Planificacion pendientes' table."];
planificacion_pendientes_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Planificacion pendientes' table."];

planificacion_pendientes_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Planificacion pendientes' table."];
planificacion_pendientes_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Planificacion pendientes' table."];
planificacion_pendientes_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Planificacion pendientes' table."];
planificacion_pendientes_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Planificacion pendientes' table, regardless of their owner."];

planificacion_pendientes_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Planificacion pendientes' table."];
planificacion_pendientes_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Planificacion pendientes' table."];
planificacion_pendientes_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Planificacion pendientes' table."];
planificacion_pendientes_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Planificacion pendientes' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
