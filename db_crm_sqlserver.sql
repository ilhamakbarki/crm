USE [db_crm]
GO
/****** Object:  Table [dbo].[admin]    Script Date: 11/24/2017 10:31:12 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[admin](
	[uid] [int] IDENTITY(1,1) NOT NULL,
	[nama] [nvarchar](50) NULL,
	[alamat] [nvarchar](50) NULL,
	[email] [nvarchar](50) NULL,
	[telp] [nvarchar](15) NULL,
	[id_u] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
 CONSTRAINT [IX_admin] UNIQUE NONCLUSTERED 
(
	[id_u] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[barang]    Script Date: 11/24/2017 10:31:12 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[barang](
	[uid] [int] IDENTITY(1,1) NOT NULL,
	[kode] [nvarchar](25) NULL,
	[nama] [nvarchar](25) NULL,
	[satuan] [nvarchar](10) NULL,
	[stok] [int] NULL,
	[beli] [bigint] NULL,
PRIMARY KEY CLUSTERED 
(
	[uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[kode] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[distributor]    Script Date: 11/24/2017 10:31:12 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[distributor](
	[uid] [int] IDENTITY(1,1) NOT NULL,
	[nama] [nvarchar](25) NULL,
	[pt] [nvarchar](50) NULL,
	[alamat] [nvarchar](50) NULL,
	[email] [nvarchar](50) NULL,
	[telp] [nvarchar](14) NULL,
	[id_u] [int] NULL,
	[grup] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
 CONSTRAINT [IX_distributor] UNIQUE NONCLUSTERED 
(
	[id_u] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[distributor_grup]    Script Date: 11/24/2017 10:31:12 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[distributor_grup](
	[uid] [int] IDENTITY(1,1) NOT NULL,
	[nama] [nvarchar](25) NULL,
	[persentasi_jual] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[harga_barang]    Script Date: 11/24/2017 10:31:12 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[harga_barang](
	[uid_barang] [int] NOT NULL,
	[uid_dgrup] [int] NOT NULL,
	[harga] [bigint] NULL,
PRIMARY KEY CLUSTERED 
(
	[uid_barang] ASC,
	[uid_dgrup] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[user]    Script Date: 11/24/2017 10:31:12 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[user](
	[uid] [int] IDENTITY(1,1) NOT NULL,
	[user] [nvarchar](20) NULL,
	[level] [int] NULL,
	[pwd] [nvarchar](500) NULL,
	[token_forgot] [nvarchar](500) NULL,
	[forgot_time] [nvarchar](500) NULL,
	[token_api] [nvarchar](500) NULL,
PRIMARY KEY CLUSTERED 
(
	[uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[user] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[user_level]    Script Date: 11/24/2017 10:31:12 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[user_level](
	[uid] [int] IDENTITY(1,1) NOT NULL,
	[nama] [nvarchar](15) NULL,
PRIMARY KEY CLUSTERED 
(
	[uid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
ALTER TABLE [dbo].[admin]  WITH CHECK ADD FOREIGN KEY([id_u])
REFERENCES [dbo].[user] ([uid])
GO
ALTER TABLE [dbo].[distributor]  WITH CHECK ADD FOREIGN KEY([grup])
REFERENCES [dbo].[distributor_grup] ([uid])
GO
ALTER TABLE [dbo].[distributor]  WITH CHECK ADD FOREIGN KEY([id_u])
REFERENCES [dbo].[user] ([uid])
GO
ALTER TABLE [dbo].[harga_barang]  WITH CHECK ADD FOREIGN KEY([uid_barang])
REFERENCES [dbo].[barang] ([uid])
GO
ALTER TABLE [dbo].[harga_barang]  WITH CHECK ADD FOREIGN KEY([uid_dgrup])
REFERENCES [dbo].[distributor_grup] ([uid])
GO
ALTER TABLE [dbo].[user]  WITH CHECK ADD FOREIGN KEY([level])
REFERENCES [dbo].[user_level] ([uid])
GO
