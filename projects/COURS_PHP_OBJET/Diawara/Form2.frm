VERSION 5.00
Object = "{67397AA1-7FB1-11D0-B148-00A0C922E820}#6.0#0"; "MSADODC.OCX"
Object = "{CDE57A40-8B86-11D0-B3C6-00A0C90AEA82}#1.0#0"; "MSDATGRD.OCX"
Begin VB.Form Form2 
   Caption         =   "Form2"
   ClientHeight    =   7200
   ClientLeft      =   120
   ClientTop       =   450
   ClientWidth     =   15270
   LinkTopic       =   "Form2"
   ScaleHeight     =   7200
   ScaleWidth      =   15270
   StartUpPosition =   3  'Windows Default
   Begin VB.TextBox idcl 
      Height          =   375
      Left            =   2760
      TabIndex        =   14
      Top             =   1440
      Width           =   1335
   End
   Begin MSAdodcLib.Adodc Adodc1 
      Height          =   735
      Left            =   9120
      Top             =   2520
      Width           =   2775
      _ExtentX        =   4895
      _ExtentY        =   1296
      ConnectMode     =   0
      CursorLocation  =   3
      IsolationLevel  =   -1
      ConnectionTimeout=   15
      CommandTimeout  =   30
      CursorType      =   3
      LockType        =   3
      CommandType     =   2
      CursorOptions   =   0
      CacheSize       =   50
      MaxRecords      =   0
      BOFAction       =   0
      EOFAction       =   0
      ConnectStringType=   1
      Appearance      =   1
      BackColor       =   -2147483643
      ForeColor       =   -2147483640
      Orientation     =   0
      Enabled         =   -1
      Connect         =   "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\Users\ABOU BAH\Desktop\djmera.mdb;Persist Security Info=False"
      OLEDBString     =   "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\Users\ABOU BAH\Desktop\djmera.mdb;Persist Security Info=False"
      OLEDBFile       =   ""
      DataSourceName  =   ""
      OtherAttributes =   ""
      UserName        =   ""
      Password        =   ""
      RecordSource    =   "CLIENT"
      Caption         =   "Adodc1"
      BeginProperty Font {0BE35203-8F91-11CE-9DE3-00AA004BB851} 
         Name            =   "MS Sans Serif"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      _Version        =   393216
   End
   Begin MSDataGridLib.DataGrid DataGrid1 
      Bindings        =   "Form2.frx":0000
      Height          =   495
      Left            =   7560
      TabIndex        =   13
      Top             =   840
      Width           =   7695
      _ExtentX        =   13573
      _ExtentY        =   873
      _Version        =   393216
      HeadLines       =   1
      RowHeight       =   15
      FormatLocked    =   -1  'True
      BeginProperty HeadFont {0BE35203-8F91-11CE-9DE3-00AA004BB851} 
         Name            =   "MS Sans Serif"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      BeginProperty Font {0BE35203-8F91-11CE-9DE3-00AA004BB851} 
         Name            =   "MS Sans Serif"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      ColumnCount     =   5
      BeginProperty Column00 
         DataField       =   "idclient"
         Caption         =   "idclient"
         BeginProperty DataFormat {6D835690-900B-11D0-9484-00A0C91110ED} 
            Type            =   0
            Format          =   ""
            HaveTrueFalseNull=   0
            FirstDayOfWeek  =   0
            FirstWeekOfYear =   0
            LCID            =   1036
            SubFormatType   =   0
         EndProperty
      EndProperty
      BeginProperty Column01 
         DataField       =   "nom"
         Caption         =   "nom"
         BeginProperty DataFormat {6D835690-900B-11D0-9484-00A0C91110ED} 
            Type            =   0
            Format          =   ""
            HaveTrueFalseNull=   0
            FirstDayOfWeek  =   0
            FirstWeekOfYear =   0
            LCID            =   1036
            SubFormatType   =   0
         EndProperty
      EndProperty
      BeginProperty Column02 
         DataField       =   "pnom"
         Caption         =   "pnom"
         BeginProperty DataFormat {6D835690-900B-11D0-9484-00A0C91110ED} 
            Type            =   0
            Format          =   ""
            HaveTrueFalseNull=   0
            FirstDayOfWeek  =   0
            FirstWeekOfYear =   0
            LCID            =   1036
            SubFormatType   =   0
         EndProperty
      EndProperty
      BeginProperty Column03 
         DataField       =   "adresse"
         Caption         =   "adresse"
         BeginProperty DataFormat {6D835690-900B-11D0-9484-00A0C91110ED} 
            Type            =   0
            Format          =   ""
            HaveTrueFalseNull=   0
            FirstDayOfWeek  =   0
            FirstWeekOfYear =   0
            LCID            =   1036
            SubFormatType   =   0
         EndProperty
      EndProperty
      BeginProperty Column04 
         DataField       =   "tel"
         Caption         =   "tel"
         BeginProperty DataFormat {6D835690-900B-11D0-9484-00A0C91110ED} 
            Type            =   0
            Format          =   ""
            HaveTrueFalseNull=   0
            FirstDayOfWeek  =   0
            FirstWeekOfYear =   0
            LCID            =   1036
            SubFormatType   =   0
         EndProperty
      EndProperty
      SplitCount      =   1
      BeginProperty Split0 
         BeginProperty Column00 
            ColumnWidth     =   915,024
         EndProperty
         BeginProperty Column01 
            ColumnWidth     =   1739,906
         EndProperty
         BeginProperty Column02 
            ColumnWidth     =   1739,906
         EndProperty
         BeginProperty Column03 
            ColumnWidth     =   1739,906
         EndProperty
         BeginProperty Column04 
            ColumnWidth     =   1739,906
         EndProperty
      EndProperty
   End
   Begin VB.CommandButton Command3 
      Caption         =   "Modifier"
      Height          =   375
      Left            =   4920
      TabIndex        =   12
      Top             =   6600
      Width           =   1455
   End
   Begin VB.CommandButton Command2 
      Caption         =   "Suppprimer"
      Height          =   375
      Left            =   2760
      TabIndex        =   11
      Top             =   6480
      Width           =   1575
   End
   Begin VB.CommandButton Command1 
      Caption         =   "Ajouter"
      Height          =   375
      Left            =   480
      TabIndex        =   10
      Top             =   6360
      Width           =   1575
   End
   Begin VB.TextBox tel 
      Height          =   285
      Left            =   2640
      TabIndex        =   9
      Top             =   5520
      Width           =   1335
   End
   Begin VB.TextBox adr 
      Height          =   375
      Left            =   2640
      TabIndex        =   8
      Top             =   4560
      Width           =   1215
   End
   Begin VB.TextBox pno 
      Height          =   375
      Left            =   2640
      TabIndex        =   7
      Top             =   3600
      Width           =   1335
   End
   Begin VB.TextBox no 
      Height          =   285
      Left            =   2640
      TabIndex        =   6
      Top             =   2640
      Width           =   1215
   End
   Begin VB.Label Label6 
      Caption         =   "tel"
      Height          =   495
      Left            =   480
      TabIndex        =   5
      Top             =   5280
      Width           =   735
   End
   Begin VB.Label Label5 
      Caption         =   "adresse"
      Height          =   375
      Left            =   360
      TabIndex        =   4
      Top             =   4440
      Width           =   1575
   End
   Begin VB.Label Label4 
      Caption         =   "pnom"
      Height          =   495
      Left            =   360
      TabIndex        =   3
      Top             =   3480
      Width           =   1215
   End
   Begin VB.Label Label3 
      Caption         =   "nom"
      Height          =   615
      Left            =   360
      TabIndex        =   2
      Top             =   2520
      Width           =   1095
   End
   Begin VB.Label Label2 
      Caption         =   "idclient"
      Height          =   615
      Left            =   360
      TabIndex        =   1
      Top             =   1440
      Width           =   1095
   End
   Begin VB.Label Label1 
      BackColor       =   &H00C00000&
      Caption         =   "CLIENT"
      BeginProperty Font 
         Name            =   "MS Sans Serif"
         Size            =   13.5
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   615
      Left            =   3240
      TabIndex        =   0
      Top             =   240
      Width           =   2175
   End
End
Attribute VB_Name = "Form2"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
