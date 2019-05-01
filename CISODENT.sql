

-- Create table USUARIO
create table USUARIO
(
  cod_usuario   VARCHAR(10) not null,
  cod_persona   INT(10),
  pwd_usr       VARCHAR(20),
  fec_alta      DATE,
  fec_baja      DATE,
  fec_vig_pwr   DATE,
  fec_ult_log   DATE,
  flg_clave_mod VARCHAR(1),
  flg_bloqueo   VARCHAR(1),
  est_reg       VARCHAR(1),
  usr_reg       VARCHAR(10),
  fec_reg       DATE,
  usr_mod       VARCHAR(10),
  fec_mod       DATE,
  maq_ip        VARCHAR(15)
);
-- Create/Recreate primary, unique and foreign key constraints 
alter table USUARIO
  add constraint PK_USUARIO primary key (COD_USUARIO);
alter table USUARIO
  add constraint FK_USUARIO_REF_PERSONA foreign key (COD_PERSONA)
  references PERSONA (COD_PERSONA);
  

-- Create table
create table EMPRESA
(
  cod_empresa   NUMBER(3) not null,
  des_empresa   VARCHAR2(150),
  des_corta     VARCHAR2(50),
  num_ruc       VARCHAR2(11),
  fec_afilia    DATE,
  des_direccion VARCHAR2(150),
  tel_fijo      VARCHAR2(30),
  tel_anexo     VARCHAR2(30)
  tel_movil     VARCHAR2(30),
  cod_ubigeo    VARCHAR2(6),
  flg_afiliado  VARCHAR2(1),
  longitud      VARCHAR2(200),
  latitud       VARCHAR2(200),
  horario       VARCHAR2(100),
  est_reg       VARCHAR2(1),
  usr_reg       VARCHAR2(10),
  fec_reg       DATE,
  usr_mod       VARCHAR2(10),
  fec_mod       DATE,
  maq_ip        VARCHAR2(15),
 
);
-- Add comments to the columns 
comment on column EMPRESA.flg_afiliado
  is '1: Sede afiliado a la red 0: Sede Desafiliado a la red';
-- Create/Recreate primary, unique and foreign key constraints 
alter table EMPRESA
  add constraint PK_EMPRESA primary key (COD_EMPRESA);
  
-- Create table USUARIO EMPRESA
create table USUARIO_EMPRESA
(
  cod_usuario VARCHAR2(10) not null,
  cod_empresa NUMBER(3) not null,
  est_reg     VARCHAR2(1),
  usr_reg     VARCHAR2(10),
  fec_reg     DATE,
  usr_mod     VARCHAR2(10),
  fec_mod     DATE,
  maq_ip      VARCHAR2(15),
  fec_baja    DATE,
  fec_alta    DATE
);
-- Create/Recreate primary, unique and foreign key constraints 
alter table USUARIO_EMPRESA
  add constraint PK_USUARIO_EMPRESA primary key (COD_USUARIO, COD_EMPRESA);
alter table USUARIO_EMPRESA
  add constraint FK_USUARIO_EMP_REF_USUARIO foreign key (COD_USUARIO)
  references USUARIO (COD_USUARIO);
alter table USUARIO_EMPRESA
  add constraint FK_USUARIO__REFERENCE_EMPRESA foreign key (COD_EMPRESA)
  references EMPRESA (COD_EMPRESA);
  
  
  
-- Create table PERFIL
create table PERFIL
(
  cod_perfil  NUMBER(3) not null,
  des_perfil  VARCHAR2(120),
  tie_session NUMBER(3),
  est_reg     VARCHAR2(1),
  usr_reg     VARCHAR2(10),
  fec_reg     DATE,
  usr_mod     VARCHAR2(10),
  fec_mod     DATE,
  maq_ip      VARCHAR2(15)
);
-- Create/Recreate primary, unique and foreign key constraints 
alter table PERFIL
  add constraint PK_PERFIL primary key (COD_PERFIL);
  
  

-- Create table
create table OPCION
(
  cod_opcion     VARCHAR2(11) not null,
  cod_opcion_pad VARCHAR2(11),
  des_opcion     VARCHAR2(40),
  des_tooltip    VARCHAR2(100),
  des_ubicacion  VARCHAR2(100),
  niv_opcion     VARCHAR2(11),
  ico_opcion     VARCHAR2(50),
  est_reg        VARCHAR2(1),
  usr_reg        VARCHAR2(10),
  fec_reg        DATE,
  usr_mod        VARCHAR2(10),
  fec_mod        DATE,
  maq_ip         VARCHAR2(15),
  num_orden      NUMBER(3)
);
-- Create/Recreate primary, unique and foreign key constraints 
alter table OPCION
  add constraint PK_OPCION primary key (COD_OPCION);
 
alter table OPCION
  add constraint FK_OPCION_REF_OPCION foreign key (COD_OPCION_PAD)
  references OPCION (COD_OPCION);
  



-- Create table
create table PERFIL_OPCION
(
  cod_perfil NUMBER(3) not null,
  cod_opcion VARCHAR2(11) not null,
  est_reg    VARCHAR2(1),
  usr_reg    VARCHAR2(10),
  fec_reg    DATE,
  usr_mod    VARCHAR2(10),
  fec_mod    DATE,
  maq_ip     VARCHAR2(15)
);
-- Create/Recreate primary, unique and foreign key constraints 
alter table PERFIL_OPCION
  add constraint PK_PEFIL_OPCION primary key (COD_PERFIL, COD_OPCION);
alter table PERFIL_OPCION
  add constraint FK_PEFIL_OPCION_REF_OPCION foreign key (COD_OPCION)
  references OPCION (COD_OPCION);
alter table PERFIL_OPCION
  add constraint FK_PEFIL_OPCION_REF_PERFIL foreign key (COD_PERFIL)
  references PERFIL (COD_PERFIL);


-- Create table
create table USUARIO_PERFIL
(
  cod_perfil  NUMBER(3) not null,
  cod_usuario VARCHAR2(10) not null,
  cod_empresa NUMBER(3) not null,
  fec_baja    DATE,
  est_reg     CHAR(1),
  usr_reg     VARCHAR2(10),
  fec_reg     DATE,
  usr_mod     VARCHAR2(10),
  fec_mod     DATE,
  maq_ip      VARCHAR2(15)
);
-- Create/Recreate primary, unique and foreign key constraints 
alter table USUARIO_PERFIL
  add constraint PK_USUARIO_PERFIL primary key (COD_PERFIL, COD_USUARIO, COD_EMPRESA);
alter table USUARIO_PERFIL
  add constraint FK_USUA_PERFIL_REF_USUA_EMP foreign key (COD_USUARIO, COD_EMPRESA)
  references USUARIO_EMPRESA (COD_USUARIO, COD_EMPRESA);
alter table USUARIO_PERFIL
  add constraint FK_USUARIO_PERFIL_REF_PERFIL foreign key (COD_PERFIL)
  references PERFIL (COD_PERFIL);




-- Create table
create table PROSPECTO
(
  cod_prospe  NUMBER(10) not null,
  cod_empresa NUMBER(3),
  ape_paterno VARCHAR2(30),
  ape_materno VARCHAR2(30),
  nombres     VARCHAR2(50),
  fec_contac  DATE,
  tel_cel     VARCHAR2(10),
  num_pros    VARCHAR2(15),
  flgprior    VARCHAR2(5),
  flg_sexo    VARCHAR2(1),
  est_reg     VARCHAR2(1),
  fec_reg     DATE,
  usr_reg     VARCHAR2(10),
  fec_mod     DATE,
  usr_mod     VARCHAR2(10),
  maq_ip      VARCHAR2(15),
  cod_tip_cap NUMBER(4),
  observa     VARCHAR2(200),
  cod_tip_ori NUMBER(4),
  flg_asisten VARCHAR2(1)
);
-- Create/Recreate primary, unique and foreign key constraints 
alter table PROSPECTO
  add constraint PK_PERSONA_PROSPECTO primary key (COD_PROSPE);
alter table PROSPECTO
  add constraint FK_PER_NEO_REF_CEN foreign key (COD_EMPRESA)
  references EMPRESA (COD_EMPRESA);

-- PROCEDIMIENTO Nº0 --

  CREATE PROCEDURE USP_PROSPECTO_LIST ( vn_codEmp     IN prospecto.Cod_Empresa,
                               vs_apeNombre  IN prospecto.nombres,
                               vs_apePaterno IN prospecto.ape_paterno,
                               vs_apeMaterno IN prospecto.ape_materno,
                               vn_codPros    IN prospecto.cod_prospe,
                               vs_numCel     IN prospecto.tel_cel,
                               vs_fecIni     IN varchar,
                               vs_fecFin     IN varchar,
                               vs_opcion     IN varchar,
                               vr_prospeto   OUT resultset,
                               vs_retorno    OUT varchar ) as
BEGIN
 BEGIN

  IF vs_opcion  = '1' Then
    OPEN vr_prospeto FOR
      select pp.cod_prospe AS codPros,
             pp.cod_empresa AS codCen,
             (select e.des_corta from empresa e where e.cod_empresa = pp.cod_empresa) as desSede,
             pp.ape_paterno AS apePat,
             pp.ape_materno AS apeMat,
             pp.nombres AS nombres,
             pp.tel_cel AS telCel,
             pp.num_pros AS numPros,
             pp.flgprior AS flgPrio,
             pp.flg_sexo AS flgSex,
             pp.est_reg AS estReg,
             pp.usr_reg AS usuReg,
              to_char(pp.fec_contac,'dd/MM/yyyy HH:MM:SS') AS fecContac,
             pp.cod_tip_cap AS codTipoCap,
             (SELECT mt.des_tipo FROM tipo mt WHERE mt.cod_tipo = pp.cod_tip_cap) AS desTipoCamp,
             pp.observa AS desObserva,
             pp.cod_tip_ori AS codTipOri,
             (SELECT mt.des_tipo FROM tipo mt WHERE mt.cod_tipo = pp.cod_tip_ori) AS desTipoOrigPros,
             pp.flg_asisten AS flgAsis,
            (DECODE (pp.flg_asisten,'1','ASISTIO','0','NO ASISTIO')) AS desAsis
        FROM prospecto pp,
             empresa ca
        where
             pp.cod_empresa = ca.cod_empresa
         AND (pp.cod_empresa = vn_codEmp OR vn_codEmp ='-1')
         AND (pp.cod_prospe = vn_codPros OR vn_codPros =0)
         and (pp.nombres  =vs_apeNombre OR vs_apeNombre IS NULL)
         and (pp.ape_paterno = vs_apePaterno OR vs_apePaterno IS NULL);


  END IF;

        vs_retorno := '0';
        EXCEPTION WHEN OTHERS THEN
        vs_retorno := PKG_UTILIT.USF_ERRORES_HISE(SUBSTR(SQLERRM, 1, 9) , 'PACIENTE');
        END;
END USP_PROSPECTO_LIST;
-- PROCEDIMIENTO Nº1 --

PROCEDURE USP_PROSPECTO_MANT ( vn_codProspe         prospecto.cod_prospe,
                               vn_codCentro         prospecto.cod_empresa,
                               vs_apePaterno        prospecto.ape_paterno,
                               vs_apeMaterno        prospecto.ape_materno,
                               vs_nombres           prospecto.nombres,
                               vs_fecContac         VARCHAR,
                               vs_telCel            prospecto.tel_cel,
                               vs_numPros           prospecto.num_pros,
                               vs_fldPrior          prospecto.flgprior,
                               vs_flgSexo           prospecto.flg_sexo,
                               vn_codTipCap         prospecto.cod_tip_cap,
                               vs_desObser          prospecto.observa,
                               vn_codTipOri         prospecto.cod_tip_ori,
                               vs_estReg            prospecto.est_reg,
                               vs_usrReg            prospecto.usr_reg,
                               vs_maqIp             prospecto.maq_ip,
                               vs_opcion            varchar,
                               vs_retorno           OUT varchar ) AS

ln_codigo   INT(10);
ls_numPros  varchar(11);
ls_nickName varchar(20);
BEGIN
    BEGIN
    IF  vs_opcion = 'I' Then

     SELECT SEQ_PROSPECTO.NEXTVAL INTO ln_codigo FROM DUAL;


     ls_numPros:= vn_codCentro ||ln_codigo ||'0';

       insert into prospecto (COD_PROSPE, COD_EMPRESA, APE_PATERNO, APE_MATERNO, NOMBRES, FEC_CONTAC, TEL_CEL, NUM_PROS, FLGPRIOR, FLG_SEXO, EST_REG, FEC_REG, USR_REG, MAQ_IP,cod_tip_cap,observa,COD_TIP_ORI )
       values (ln_codigo, vn_codCentro, vs_apePaterno, vs_apeMaterno, vs_nombres, SYSDATE, vs_telCel, ls_numPros,vs_fldPrior, vs_flgSexo, '1', SYSDATE, vs_usrReg, vs_maqIp,vn_codTipCap,vs_desObser,vn_codTipOri);


     ELSIF vs_opcion = 'U'  THEN

     ls_numPros:= vn_codCentro ||ln_codigo ||'0';

        UPDATE prospecto p
           SET  p.cod_empresa   = vn_codCentro,
                p.ape_paterno  = vs_apePaterno,
                p.ape_materno  = vs_apeMaterno,
                p.nombres      = vs_nombres,
                p.tel_cel      = vs_telCel,
                p.num_pros     = ls_numPros,
                p.flgprior     = vs_fldPrior,
                p.flg_sexo     = vs_flgSexo,
                p.est_reg      = '1',
                p.cod_tip_cap  = vn_codTipCap,
                p.observa      = vs_desObser,
                p.cod_tip_ori  = vn_codTipOri,
                p.usr_mod      = vs_usrReg,
                p.maq_ip       = vs_maqIp,
                p.fec_mod      = sysdate
               WHERE  p.cod_prospe = vn_codProspe;

     ELSIF vs_opcion = 'E' THEN

            Update prospecto p
               SET p.est_reg         =  '0',
                   p.usr_mod         =  vs_usrReg,
                   p.fec_mod         =  sysdate,
                   p.maq_ip          =  vs_maqIp
              WHERE p.cod_prospe = vn_codProspe;

     ELSIF vs_opcion = 'A' THEN

            Update prospecto p
               SET p.flg_asisten     =  vs_estReg,
                   p.usr_mod         =  vs_usrReg,
                   p.fec_mod         =  sysdate,
                   p.maq_ip          =  vs_maqIp
              WHERE p.cod_prospe = vn_codProspe;

     END IF ;

         vs_retorno  := '0';
         COMMIT;
     EXCEPTION WHEN OTHERS THEN
         vs_retorno := PKG_UTILIT.USF_ERRORES_HISE(SUBSTR(SQLERRM, 1, 9) , 'PERSONA');

         ROLLBACK;
     END ;


END USP_PROSPECTO_MANT;
