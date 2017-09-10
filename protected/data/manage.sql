DROP TABLE "user";
DROP TABLE "userinfo";
DROP TABLE "followup";
DROP TABLE "childinfo";

CREATE TABLE "user" (
"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"username" TEXT,
"password" TEXT,
"email" TEXT,
"telephonenum" TEXT,
"weixinnum" TEXT,
"qqnum" TEXT,
"sinanum" TEXT,
"createtime" TEXT,
"updatetime" TEXT,
"deletetime" TEXT,
"deleteflag" INTEGER
);

CREATE TABLE "userinfo" (
"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"createby" INTEGER,
"realname" TEXT,
"birthday" TEXT,
"sex" INTEGER,
"age" INTEGER,
"career" TEXT,
"remark" TEXT,
"come" INTEGER,
"pricelevel" INTEGER,
"email" TEXT,
"telephonenum" TEXT,
"weixinnum" TEXT,
"qqnum" TEXT,
"sinanum" TEXT,
"createtime" TEXT,
"updatetime" TEXT,
"deletetime" TEXT,
"deleteflag" INTEGER
);

CREATE TABLE "followup" (
"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"userId" INTEGER,
"followtime" TEXT,
"context" TEXT,
"remark" TEXT,
"createtime" TEXT,
"updatetime" TEXT,
"deletetime" TEXT,
"deleteflag" INTEGER
);

CREATE TABLE "childinfo" (
"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"userinfoId" INTEGER,
"realname" TEXT,
"sex" INTEGER,
"birthday" TEXT,
"remark" TEXT,
"createtime" TEXT,
"updatetime" TEXT,
"deletetime" TEXT,
"deleteflag" INTEGER
);

